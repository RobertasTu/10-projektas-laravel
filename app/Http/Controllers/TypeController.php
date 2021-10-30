<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
    $types = Type::orderBy($collumnName, $sortBy)->paginate(5);
    return view('type.index', ['types'=>$types, 'collumnName'=> $collumnName, 'sortBy'=>$sortBy]);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('type.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type;

        $type->title = $request->type_title;

        $type->save();

        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {       $tasks = $type->typeTasks;
        $tasks_count = $tasks->count();
        return view('type.show', ['type'=>$type, 'tasks'=> $tasks, 'tasks_count'=> $tasks_count ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('type.edit', ['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $type->title = $request->type_title;

        $type->save();
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type, Request $request )
    {
        $tasks_count = $type->typeTasks->count();

        if($tasks_count!=0){
            return redirect()->route("type.index")->with('error_message','Tipo ištrinti negalima, nes yra prie priskirtu uzduocius');
        }

        $type->delete();
        return redirect()->route('type.index')->with('success_message', 'Tipas sėkmingai ištrintas');
    }
    public function search(Request $request) {
        $search = $request->search;
        $types = Type::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description','LIKE', "%{$search}%")->paginate(5);
        return view('type.search', ['types'=>$types]);
    }
}
