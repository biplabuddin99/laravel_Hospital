<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Designation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations=Designation::paginate(10);
        return view('designation.index',compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designation.create');
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
            $des=new Designation;
            $des->desig_name=$request->DesignationName;
            $des->desig_des=$request->DesignationDescription;
            $des->status=$request->status;
            $des->save();
            Toastr::success('Designation created Successfully!');
            return redirect(route('designation.index'));
            // dd($request);
        }
        catch (Exception $e){
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        return view('designation.edit',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
                try{
            $desupdate=$designation;
            $desupdate->desig_name=$request->DesignationName;
            $desupdate->desig_des=$request->DesignationDescription;
            $desupdate->status=$request->status;
            if($desupdate->save());
            Toastr::info('Designation Updated Successfully!');
            return redirect(route('designation.index'));

        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        Toastr::warning('Designation Deleted Successfully!');
        return redirect()->back();
    }
}
