<?php

namespace App\Http\Controllers;

use App\Models\Depertment;
use Illuminate\Http\Request;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Depertment::paginate(10);
        return view('department.depindex',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.depcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dep=new Depertment;
        $dep->name=$request->dep_name;
        $dep->description=$request->dep_description;
        $dep->status=$request->status;
        $dep->save();
        return redirect(route('department.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function show(Depertment $depertment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function edit(Depertment $depertment)
    {
        $depar=Depertment::all();
        return view('department.depedit',compact('depar','depertment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depertment $depertment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depertment $depertment)
    {
        //
    }
}
