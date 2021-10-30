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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginationSetting $paginationSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginationSetting $paginationSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginationSetting $paginationSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginationSetting $paginationSetting)
    {
        //
    }
}
