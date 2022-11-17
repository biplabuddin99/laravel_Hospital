<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Blood;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::paginate(10);
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Role::all();
        $blood=Blood::all();
        return view('employee.create',compact('role','blood'));

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
            //  dd($request);
        $employee=new Employee;
        $employee->role_id=$request->userRoles;
        $employee->name=$request->FullName;
        $employee->address=$request->FullAddress;
        $employee->phone=$request->contact;
        $employee->email=$request->emaillAdress;
        $employee->birth_date=$request->birthdate;
        $employee->gender=$request->gender;
        $employee->blood_id=$request->blood;
        $employee->status=$request->status;
        if($request->hasFile('image')){
            $imageName = rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/employee'), $imageName);
            $employee->picture=$imageName;
        }
        $employee->save();
            }catch (Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {
        // $role_id=$id;
        $employee=Employee::findOrFail($role_id);
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
