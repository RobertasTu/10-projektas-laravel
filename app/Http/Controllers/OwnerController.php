<?php

namespace App\Http\Controllers;

use PDF;
use App\Owner;
use Illuminate\Http\Request;
use App\Type;
use App\Task;

class OwnerController extends Controller
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
    $owners = Owner::orderBy($collumnName, $sortBy)->paginate(15);
    return view('owner.index', ['owners'=>$owners, 'collumnName'=> $collumnName, 'sortBy'=>$sortBy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner = new Owner;

        $validateVar = $request->validate ([
            'owner_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'owner_surname' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'owner_email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:owners,email',
            'owner_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',


        ]);

        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;

        $owner->save();

        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view ('owner.show', ['owner'=>$owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit', ['owner'=>$owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $validateVar = $request->validate ([
            'owner_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'owner_surname' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'owner_email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'owner_phone' => 'required|regex:(86|\+3706) \d{3} \d{4}|max:9',


        ]);
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;

        $owner->save();

        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owner.index')->with('success_message', 'Vartotojas sekmingai istrintas');
    }

    public function generateOwnerPDF(Owner $owner) {
        view()->share('owner', $owner);
        $pdf = PDF::loadView('owner/pdf_owner_template', $owner);
        return $pdf->download('owner'.$owner->id.'.pdf');
    }
    public function generatePDF() {
        $owners = Owner::all();
        view()->share('owners', $owners);
        $pdf = PDF::loadView('owner/pdf_template', $owners);
        return $pdf->download('owners.pdf');
    }
    public function stat() {
        $owners = Owner::all();
        $types = Type::all();
        $tasks = Task::all();

        $owners_count = $owners->count();
        $types_count = $types->count();
        $tasks_count = $tasks->count();

        return view('owner.stat', ['owners' => $owners, 'types'=>$types, 'tasks'=>$tasks, 'tasks_count'=>$tasks_count, 'types_count'=>$types_count, 'owners_count'=>$owners_count]);
    }
}
