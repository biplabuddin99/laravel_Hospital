<?php

namespace App\Http\Controllers;

use App\Models\Depertment;
use Exception;
use Illuminate\Http\Request;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Depertment::paginate(10);
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
    public function store(Request $request)
    {
        try{
            $dep=new Depertment;

            $dep->name=$request->dep_name;
            $dep->description=$request->dep_description;
            $dep->status=$request->status;
            $dep->save();
            return redirect(route('depertment.index'));
            // dd($request);
        }
        catch (Exception $e){
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function show(Depertment $depertment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function edit(Depertment $depertment)
    {
        // $dep=Depertment::paginate(10);
        // $depertments=Depertment::where($department)->first();
        return view('department.dep_edit',compact('depertment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depertment $depertment)
    {
        try{
            $depertments=$depertment;
            $depertment->name=$request->dep_name;
            $depertment->description=$request->dep_description;
            $depertment->status=$request->status;
            if($depertments->save());
            return redirect(route('depertment.index'));

        }catch(Exception $e){
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depertment $depertment)
    {
        $depertment->delete();
        return redirect()->back();
    }
}
