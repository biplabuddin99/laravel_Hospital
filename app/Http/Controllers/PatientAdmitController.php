<?php

namespace App\Http\Controllers;

use App\Models\PatientAdmit;
use App\Models\RoomCategory;
use App\Models\RoomList;
use App\Models\Doctor;
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
        $room_cat=RoomCategory::all();
        $room_list=RoomList::all();
        $doctor=Doctor::all();
        return view('patientAdmit.patient_admit_create', compact('room_cat','room_list','doctor'));
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

            if($request->hasFile('picture')){
                $imageName = rand(111,999).time().'.'.$request->picture->extension();
                $request->picture->move(public_path('uploads/patientAdmit'), $imageName);
                $pa->picture=$imageName;
            }
            $pa->dob=$request->birth_date;
            $pa->gender=$request->patientGender;
            $pa->father_name=$request->father_name;
            $pa->mother_name=$request->mother_name;
            $pa->husband_name=$request->husband_name;
            $pa->marital_status=$request->marital_status;
            $pa->doctor_id=$request->doctor_id;
            $pa->problem=$request->problem;
            $pa->admit_date=$request->admit_date;
            $pa->guardian=$request->guardian_name;
            $pa->relation=$request->relation;
            $pa->emg_condition=$request->patient_emrg;
            $pa->blood=$request->blood;
            $pa->present_add=$request->present_address;
            $pa->permanent_add=$request->permanent_address;
            $pa->problem=$request->problem;
            $pa->room_category_id=$request->room_cat_id;
            $pa->room_list_id=$request->room_no;
            $pa->status=1;
            $pa->save();
            return redirect(route('patientAdmit.index'));


        }catch(Exception $e){
            dd($e);
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
        $room_cat=RoomCategory::all();
        $room_list=RoomList::all();
        $doctor=Doctor::all();
        $pAdmit=PatientAdmit::findOrFail($id);
        return view('patientAdmit.patient_admit_edit', compact('pAdmit','room_cat','room_list','doctor'));
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
            if($request->hasFile('picture')){
                $imageName = rand(111,999).time().'.'.$request->picture->extension();
                $request->picture->move(public_path('uploads/patientAdmit'), $imageName);
                $pa->picture=$imageName;
            }
            $pa->dob=$request->birth_date;
            $pa->gender=$request->patientGender;
            $pa->father_name=$request->father_name;
            $pa->mother_name=$request->mother_name;
            $pa->husband_name=$request->husband_name;
            $pa->marital_status=$request->marital_status;
            $pa->doctor_id=$request->doctor_id;
            $pa->problem=$request->problem;
            $pa->admit_date=$request->admit_date;
            $pa->guardian=$request->guardian_name;
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

    public function getroomlist(Request $request){
        $get_room= RoomList::where('room_category_id', $request->id)->get();
        return $get_room;
    }

}
