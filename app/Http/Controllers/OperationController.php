<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operation_table=Operation::paginate(10);
        return view('operation.index' ,compact('operation_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::all();
        return view('operation.create', compact('doctor'));
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
            $d=new Operation;
            $d->name=$request->patientName;
            $d->father_name=$request->father_name;
            $d->mother_name=$request->mother_name;
            $d->gender=$request->patientGender;
            $d->dob=$request->birth_date;
            $d->blood=$request->blood;
            $d->address=$request->address;
            $d->doctor_id=$request->doctor_ref;
            $d->opr_date=$request->operation_date;
            $d->ot_no=$request->ot_no;
            $d->description=$request->description;
            $d->status=1;
            $d->save();
            Toastr::success('Created Successfully!');
            return redirect(route('operation.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        return view('operation.show', compact('operation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        $doctor=Doctor::all();
        return view('operation.edit', compact('operation', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        try{
            $d=$operation;
            $d->name=$request->patientName;
            $d->father_name=$request->father_name;
            $d->mother_name=$request->mother_name;
            $d->gender=$request->patientGender;
            $d->dob=$request->birth_date;
            $d->blood=$request->blood;
            $d->address=$request->address;
            $d->doctor_id=$request->doctor_ref;
            $d->opr_date=$request->operation_date;
            $d->ot_no=$request->ot_no;
            $d->description=$request->description;
            $d->status=1;
            $d->save();
            Toastr::info('Updated Successfully!');
            return redirect(route('operation.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();
        Toastr::warning('Deleted Successfully!');
        return redirect()->back();
    }
}
