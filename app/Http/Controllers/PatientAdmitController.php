<?php

namespace App\Http\Controllers;

use App\Models\PatientAdmit;
use Illuminate\Http\Request;
use Exception; 

class PatientAdmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient_admit=PatientAdmit::paginate(10);
        return view('patientAdmit.patient_admit_index' ,compact('patient_admit'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patientAdmit.patient_admit_create');
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
            $pa=new PatientAdmit;
            $pa->name=$request->patientName;
            $pa->email=$request->email;
            $pa->phone=$request->phone;
            $pa->picture=$request->picture;
            $pa->dob=$request->birth_date;
            $pa->gender=$request->patientGender;
            $pa->father_name=$request->father_name;
            $pa->mother_name=$request->mother_name;
            $pa->husband_name=$request->husband_name;
            $pa->marital_status=$request->marital_status;
            $pa->doctor_ref=$request->doctor_ref;
            $pa->problem=$request->problem;
            $pa->admit_date=$request->admit_date;
            $pa->guardian=$request->gurdian_name;
            $pa->relation=$request->relation;
            $pa->emg_condition=$request->patient_emrg;
            $pa->blood=$request->blood;
            $pa->present_add=$request->present_address;
            $pa->permanent_add=$request->permanent_address;
            $pa->problem=$request->problem;
            $pa->status=1;
            $pa->save();
            return redirect(route('patientAdmit.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientAdmit  $patientAdmit
     * @return \Illuminate\Http\Response
     */
    public function show(PatientAdmit $patientadmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientAdmit  $patientAdmit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pAdmit=PatientAdmit::findOrFail($id);
        return view('patientAdmit.patient_admit_edit', compact('pAdmit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientAdmit  $patientAdmit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientAdmit $patientAdmit)
    {
        try{
            $pa=$patientAdmit;
            $pa->name=$request->patientName;
            $pa->email=$request->email;
            $pa->phone=$request->phone;
            $pa->picture=$request->picture;
            $pa->dob=$request->birth_date;
            $pa->gender=$request->patientGender;
            $pa->father_name=$request->father_name;
            $pa->mother_name=$request->mother_name;
            $pa->husband_name=$request->husband_name;
            $pa->marital_status=$request->marital_status;
            $pa->doctor_ref=$request->doctor_ref;
            $pa->problem=$request->problem;
            $pa->admit_date=$request->admit_date;
            $pa->guardian=$request->gurdian_name;
            $pa->relation=$request->relation;
            $pa->emg_condition=$request->patient_emrg;
            $pa->blood=$request->blood;
            $pa->present_add=$request->present_address;
            $pa->permanent_add=$request->permanent_address;
            $pa->problem=$request->problem;
            $pa->status=1;
            $pa->save();
            return redirect(route('patientAdmit.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientAdmit  $patientAdmit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientAdmit $patientAdmit)
    {
        $patientAdmit->delete();
        return redirect()->back();
    }
}
