<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blood;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Frontend;
use App\Models\Patient;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor=Doctor::all();
        $blood=Blood::orderBy('id','asc')->get();
        $department=Department::where('status',1)->orderBy('id','asc')->get();
        return view('frontend.index',compact('doctor','blood','department'));
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
        try{
            $p=new Patient;
            $p->name=$request->patientName;
            $p->age=$request->patientAge;
            $p->phone=$request->patientPhone;
            $p->dob=$request->birth_date;
            $p->gender=$request->patientGender;
            $p->blood=$request->patientBlood;
            $p->address=$request->patientAddress;
            $p->problem=$request->patientProblem;
            $p->status=1;
            $p->save();

                //===insert patient id===//

            $p->patient_id= 'PA-'.$p->id.RAND(1000,9999);
            $p->save();
            //===insert id===//
            $pa = $p->patient_id;

            return redirect()->route('welcome.index')->with('pa',$p->patient_id);


        }catch(Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    public function get_patient(Request $request)
	{
		$data = Patient::where('patient_id',$request->id)->get();
		return $data;
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
