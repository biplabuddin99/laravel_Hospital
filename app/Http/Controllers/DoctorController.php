<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Exception;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctors=Doctor::paginate(10);
        return view('doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blood=Blood::get(['id','blood_name']);
        $depart=Department::get(['id','name','status']);
        $deg=Designation::get(['id','desig_name','status']);
        return view('doctor.create',compact(['blood','depart','deg']));
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
            // dd($request);
            $employ=new Employee;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/employee'), $imageName);
                $employ->picture=$imageName;
            }
            $employ->role_id=2;
            $employ->name=$request->fullName;
            $employ->email=$request->email;
            $employ->phone=$request->contact;
            $employ->gender=$request->gender;
            $employ->birth_date=$request->birthdate;
            $employ->blood_id=$request->blood;
            $employ->address=$request->Address;
            $employ->save();

            $insertedId = $employ->id;

            $doct=new Doctor;
            $doct->employee_id=$insertedId;
            $doct->department_id=$request->department;
            $doct->designation_id=$request->designation;
            $doct->biography=$request->biography;
            $doct->specialist=$request->specialist;
            $doct->education=$request->edu;
            $doct->fees=$request->fees;
            $doct->status=$request->status;
            $doct->save();
            return back();
        }catch (Exception $e){
            dd($e);
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.view',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $blood=Blood::get(['id','blood_name']);
        $depart=Department::get(['id','name','status']);
        $deg=Designation::get(['id','desig_name','status']);
        return view('doctor.edit',compact(['doctor','blood','depart','deg']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor,Employee $employee)
    {
        try{
            // dd($request);
            $employ=$employee;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/employee'), $imageName);
                $employ->picture=$imageName;
            }
            $employ->role_id=2;
            $employ->name=$request->fullName;
            $employ->email=$request->email;
            $employ->phone=$request->contact;
            $employ->gender=$request->gender;
            $employ->birth_date=$request->birthdate;
            $employ->blood_id=$request->blood;
            $employ->address=$request->Address;
            $employ->save();

            $insertedId = $employ->id;

            $doct=$doctor;
            $doct->employee_id=$insertedId;
            $doct->department_id=$request->department;
            $doct->designation_id=$request->designation;
            $doct->biography=$request->biography;
            $doct->specialist=$request->specialist;
            $doct->education=$request->edu;
            $doct->fees=$request->fees;
            $doct->status=$request->status;
            $doct->save();
            return redirect('doctor');
        }catch (Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->back();
    }
}
