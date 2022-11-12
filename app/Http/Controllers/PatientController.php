<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient=Patient::paginate(10);
        return view('patient.patient_index',compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.patient_create');
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
            $p=new Patient;
            $p->name=$request->p_name;
            $p->age=$request->p_age;
            $p->phone=$request->p_phone;
            $p->gender=$request->p_gender;
            $p->blood=$request->p_blood;
            $p->address=$request->p_address;
            $p->problem=$request->p_problem;
            $p->status=1;
            $p->save();
            return redirect(route('patient.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patient.patient_edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        try{
            $p=$patient;
            $p->name=$request->p_name;
            $p->age=$request->p_age;
            $p->phone=$request->p_phone;
            $p->gender=$request->p_gender;
            $p->blood=$request->p_blood;
            $p->address=$request->p_address;
            $p->problem=$request->p_problem;
            $p->status=1;
            if($p->save());
            return redirect(route('patient.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->back();
    }
}
