<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomcat=RoomCategory::all();
        return view('room.index',compact('roomcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomcat=new RoomCategory;
        $roomcat->name=$request->roomCategoryName;
        $roomcat->status=$request->status;
        $roomcat->save();
        return redirect(route('roomCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RoomCategory $roomCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomCategory $roomCategory)
    {
        return view('room.edit',compact('roomCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomCategory $roomCategory)
    {
        $roomcat=$roomCategory;
        $roomcat->name=$request->roomCategoryName;
        $roomcat->status=$request->status;
        $roomcat->save();
        return redirect(route('roomCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomCategory $roomCategory)
    {
        $roomCategory->delete();
        return redirect()->back();
    }
}
