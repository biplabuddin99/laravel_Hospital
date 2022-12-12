<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use App\Models\Prescription;
use App\Models\Prescription_medicine;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescription=Prescription::paginate(10);
        return view('prescription.prescription_index',compact('prescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('prescription.prescription_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prescription = new Prescription;
        $prescription->appointment_id = $request->app_id;
        $prescription->cc = $request->cc;
        $prescription->inv = $request->inv;
        $prescription->advice = $request->advice;
        $prescription->visit = $request->visit;
        //echo $prescription;
        $prescription->save();

        if($request->m_name){
        foreach($request->m_name as $key => $value){

        $insertedId = $prescription->id;

        $data2 = new Prescription_medicine;
        $data2->prescription_id = $insertedId;
        $data2->medi_name = $request->m_name[$key];
        $data2->type = $request->m_type[$key];
        $data2->dose = $request->dose[$key];
        $data2->note = $request->note[$key];
        $data2->duration = $request->duration[$key];
        //echo $data2;
        $data2->save();
        }
        }else{
            return back()->withInput()->with("please try again");
        }

    $data3 = Appointment::findOrFail($request->app_id);
    $data3->status = 0;
    $data3->save();

    Toastr::info('prescription create Successfully!');
    return redirect(route('prescription.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pres_show=Appointment::findOrFail($id);
        $gender = $pres_show->patient->gender;
		if($gender == 1){
			$s = 'Male';
		}elseif($gender == 2){
			$s = 'Female';
		}elseif($gender == 3){
			$s = 'Common';
		}else{
			$s = '';
		}
        $pres=Prescription::select('id')->where('appointment_id',$id)->get();
        $data=$pres[0]->id;
        $data1=Prescription::findOrFail($data);

        $json=Prescription_medicine::where('prescription_id',$data)->get();
        $medi=json_decode($json,TRUE);
		// dd($json);
		return view('prescription.prescription_show')->with('data1',$data1)->with('medi',$medi)->with('pres_show',$pres_show)->with('s',$s);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
