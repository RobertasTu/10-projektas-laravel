<?php

namespace App\Http\Controllers;
use App\Type;
use App\Task;
use Illuminate\Http\Request;

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


    $types =Type::all();
    $tasks = Task::sortable()->paginate(5);
     return view('task.index', ['tasks'=>$tasks, 'collumnName'=> $collumnName, 'sortBy'=>$sortBy], ['types'=>$types]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view ('task.create', ['types'=>$types]);
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
            'title' => 'required',
            'task_start_date'=>'required|date|before:task_end_date',
            'task_end_date'=>'required|date|after:task_start_date'
        ]);


        $task->title = $request->task_title;
        $task->description = $request->task_description;
        $task->type_id = $request->task_typeid;
        $task->start_date = $request->task_start_date;
        $task->end_date = $request->task_end_date;


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
            'task_title' => 'required',
            'task_start_date'=>'required|date|before:task_end_date',
            'task_end_date'=>'required|date|after:task_start_date'
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
}


