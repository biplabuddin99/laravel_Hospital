<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Birth;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birth_table=Birth::paginate(10);
        return view('birth.birth_index' ,compact('birth_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::all();
        return view('birth.birth_create', compact('doctor'));
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
            $b=new Birth;
            $b->name=$request->patientName;
            $b->father_name=$request->father_name;
            $b->mother_name=$request->mother_name;
            $b->gender=$request->patientGender;
            $b->dob=$request->birth_date;
            $b->blood=$request->blood;
            $b->address=$request->address;
            $b->doctor_id=$request->doctor_ref;
            $b->status=1;
            $b->save();
            return redirect(route('birth.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function show(Birth $birth)
    {
        return view('birth.birth_show', compact('birth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function edit(Birth $birth)
    {
        $doctor=Doctor::all();
        return view('birth.birth_edit', compact('birth','doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Birth $birth)
    {
        try{
            $b=$birth;
            $b->name=$request->patientName;
            $b->father_name=$request->father_name;
            $b->mother_name=$request->mother_name;
            $b->gender=$request->patientGender;
            $b->dob=$request->birth_date;
            $b->blood=$request->blood;
            $b->address=$request->address;
            $b->doctor_id=$request->doctor_ref;
            $b->status=1;
            $b->save();
            return redirect(route('birth.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Birth $birth)
    {
        $birth->delete();
        return redirect()->back();
    }
}
