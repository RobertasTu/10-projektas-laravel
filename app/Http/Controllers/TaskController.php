<?php

namespace App\Http\Controllers;
use App\Owner;
use App\Type;
use App\Task;
use Illuminate\Http\Request;
use App\PaginationSetting;
use PDF;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collumnName = $request->collumnName;
        $sortBy = $request->sortBy;

        if(!$collumnName && !$sortBy) {
            $collumnName = 'id';
            $sortBy = 'asc';
    }
    $tasks = Task::all();

    $allTasks = $tasks->count();

    $paginationsettings = Paginationsetting::all();
    $paginationsetting = $request->paginationsetting;
    if(!$paginationsetting) {
        $paginationsetting = $allTasks;
    }

    if($paginationsetting == '1') {
        $paginationsetting = $allTasks;
    }


    $owners = Owner::all();
    $types = Type::all();

    $tasks = Task::sortable()->paginate($paginationsetting);
     return view('task.index', ['tasks'=>$tasks, 'collumnName'=> $collumnName, 'sortBy'=>$sortBy, 'paginationsettings'=>$paginationsettings, 'owners'=>$owners], ['types'=>$types] );
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        $types = Type::all();
        return view ('task.create', ['types'=>$types], ['owners'=>$owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;

        $validateVar = $request->validate ([
            'task_title' => 'required|min:6|max:225|regex:/^[a-zA-Z]+$/u',
            'task_description' => 'required|max:1500',
            'task_start_date'=>'required|date',
            'task_end_date'=>'required|date|after:task_start_date',
            'task_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'task_owner_id' => 'required|numeric',
            'task_typeid' => 'required|numeric',
        ]);


        $task->title = $request->task_title;
        $task->description = $request->task_description;
        $task->type_id = $request->task_typeid;
        $task->start_date = $request->task_start_date;
        $task->end_date = $request->task_end_date;
        $task->owner_id =$request->task_owner_id;


        if($request->has('task_logo')) {
         $imageName = time().'.'.$request->task_logo->extension();
        $task->logo =  time().'.'.$request->image->extension();
        $request->task_logo->move(public_path('images'), $imageName );
        } else {
        $task->logo = '/images/placeholder.png';
        }

        $task->save();



        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {   $types = Type::all()->sortBy('id', SORT_REGULAR, true);
        return view('task.edit', ['task'=>$task, 'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validateVar = $request->validate ([
            'task_title' => 'required|min:6|max:225|regex:/^[a-zA-Z]+$/u',
            'task_description' => 'required|max:1500',
            'task_start_date'=>'required|date',
            'task_end_date'=>'required|date|after:task_start_date',
            'task_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'task_owner_id' => 'required|numeric',
            'task_typeid' => 'required|numeric',
        ]);
        $task->title = $request->task_title;
        $task->description = $request->task_description;
        $task->type_id = $request->task_typeid;
        $task->start_date = $request->task_start_date;
        $task->end_date = $request->task_end_date;

        if($request->has('task_logo')) {
            $imageName = time().'.'.$request->task_logo->extension();
            $task->logo = '/images/'. $imageName;
            $request->task_logo->move(public_path('images'), $imageName);
        }
        $task->save();
        return redirect()->route('task.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }
    public function search(Request $request) {
        $search = $request->search;
        $tasks = Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description','LIKE', "%{$search}%")->paginate(5);
        return view('task.search', ['tasks'=>$tasks]);
    }

    public function filter(Request $request) {
        // $filter = $request->filter;
        $typeid = $request->task_typeid;

        // return $typeid;
        //
        // $tasks = Task::query()->where('type_id', $typeid)->paginate(5);
        $tasks = Task::sortable()->where('type_id', $typeid)->paginate(5);
        return view('task.filter', ['tasks'=>$tasks]);
    }

    public function paginate(Request $request) {

        // $pagination = $request->task_pagination;
        // $typeid = $request->task_typeid;
        // $tasks = Task::sortable()->where('type_id', $typeid)->paginate($pagination);
        // return view('task.index', ['tasks'=>$tasks]);

        // tasks = Task::sortable()->where()
    }
    public function generateTaskPDF(Task $task) {
        view()->share('task', $task);
        $pdf = PDF::loadView('task/pdf_task_template', $task);
        return $pdf->download('task'.$task->id.'.pdf');
    }
    public function generatePDF() {
        $tasks = Task::all();

        view()->share('tasks', $tasks);
        $pdf = PDF::loadView('task/pdf_template', $tasks);
        return $pdf->download('tasks.pdf');
    }
}


