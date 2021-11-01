<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\PaginationSetting;
use Illuminate\Http\Request;

class PaginationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $paginationsettings = PaginationSetting::all();
    return view('paginationsetting.index', ['paginationsettings'=>$paginationsettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $paginationsetting = PaginationSetting::all();
        return view ('paginationsetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $paginationsetting = new PaginationSetting;

        $validationVar = $request->validate ([
            'paginationsetting_title'=>'required|regex:/^[a-zA-Z]+$/u|min:6|max:225',
            'paginationsetting_value'=>'required|numeric|integer|gte:1',
            'paginationsetting_visible'=> 'min:0|max:1'
        ]);


       $paginationsetting->title = $request->paginationsetting_title;
       $paginationsetting->value = $request->paginationsetting_value;
       $paginationsetting->visible = $request->paginationsetting_visible;

       if($paginationsetting->visible) {
        $paginationsetting->visible = 1;
       } else {
        $paginationsetting->visible = 0;
       }

        $paginationsetting->save();

        return redirect()->route('paginationsetting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginationSetting $paginationsetting)
    {
        return view('paginationsetting.show', ['paginationsetting'=>$paginationsetting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginationSetting $paginationsetting)
    {
        // $paginationsetting = PaginationSetting::all();
        return view ('paginationsetting.edit', ['paginationsetting'=>$paginationsetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginationSetting $paginationsetting)
    {
        $validationVar = $request->validate ([
            'paginationsetting_title'=>'required|regex:/^[a-zA-Z]+$/u|min:6|max:225',
            'paginationsetting_value'=>'required|numeric|integer|gte:1',
            'paginationsetting_visible'=> 'numeric|integer|min:0|max:1'
        ]);
        $paginationsetting->title = $request->paginationsetting_title;
       $paginationsetting->value = $request->paginationsetting_value;
       $paginationsetting->visible = $request->paginationsetting_visible;
       if($paginationsetting->visible) {
        $paginationsetting->visible = 1;
       }
        else {
        $paginationsetting->visible = 0;
       }


       $paginationsetting->save();
       return redirect()->route('paginationsetting.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginationSetting $paginationsetting)
    {
        $paginationsetting->delete();
        return redirect()->route('paginationsetting.index');
    }
}
