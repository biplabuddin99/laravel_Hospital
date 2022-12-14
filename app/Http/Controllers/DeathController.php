<?php

namespace App\Http\Controllers;

use App\Models\Death;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Exception;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $death_table=Death::paginate(10);
        return view('death.death_index' ,compact('death_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::all();
        return view('death.death_create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $d=new Death;
            $d->name=$request->patientName;
            $d->father_name=$request->father_name;
            $d->mother_name=$request->mother_name;
            $d->gender=$request->patientGender;
            $d->dob=$request->birth_date;
            $d->blood=$request->blood;
            $d->address=$request->address;
            $d->doctor_id=$request->doctor_ref;
            $d->status=1;
            $d->save();
            return redirect(route('death.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function show(Death $death)
    {
        return view('death.death_show', compact('death'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function edit(Death $death)
    {
        $doctor=Doctor::all();
        return view('death.death_edit', compact('death', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Death $death)
    {
        try{
            $d=$death;
            $d->name=$request->patientName;
            $d->father_name=$request->father_name;
            $d->mother_name=$request->mother_name;
            $d->gender=$request->patientGender;
            $d->dob=$request->birth_date;
            $d->blood=$request->blood;
            $d->address=$request->address;
            $d->doctor_id=$request->doctor_ref;
            $d->status=1;
            $d->save();
            return redirect(route('death.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Death  $death
     * @return \Illuminate\Http\Response
     */
    public function destroy(Death $death)
    {
        $death->delete();
        return redirect()->back();
    }
}
