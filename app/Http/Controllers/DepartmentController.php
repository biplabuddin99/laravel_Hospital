<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Department;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\doctor\DepartmentRequest;
use App\Http\Requests\doctor\DepartmentUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Department::paginate(10);
        return view('department.dep_index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.dep_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        try{
            $dep=new Department;

            $dep->name=$request->DepartmentName;
            $dep->description=$request->DepartmentDescription;
            $dep->status=$request->status;
            $dep->save();
            Toastr::success('Department Created Successfully!');
            return redirect(route('department.index'));
            // dd($request);
        }
        catch (Exception $e){
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depertment  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        // $dep=Department::paginate(10);
        // $departments=Department::where($department)->first();
        return view('department.dep_edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request, Department $department)
    {
        try{
            $dep=$department;
            $dep->name=$request->DepartmentName;
            $dep->description=$request->DepartmentDescription;
            $dep->status=$request->status;
            if($dep->save());
            Toastr::info('Department Update Successfully!');
            return redirect(route('department.index'));

        }catch(Exception $e){
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        Toastr::warning('Department Deleted Permanently!');
        return redirect()->back();
    }
}
