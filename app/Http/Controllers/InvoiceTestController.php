<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Blood;
use App\Models\Patient;
use App\Models\InvoiceTest;
use App\Models\TestCategory;
use Illuminate\Http\Request;
use App\Models\InvoiceTestDetail;
use Brian2694\Toastr\Facades\Toastr;

class InvoiceTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice=InvoiceTest::all();
        return view('testinvoice.index',compact('invoice'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testcategory=TestCategory::all();
        return view('testinvoice.create',compact('testcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        		// patient basic model work

		if($request->checkExist == 0){
			$data = new Patient;
			$data->name = $request->FullName;
			$data->age = $request->patientAge;
			$data->address = $request->fullAdress;
			$data->phone = $request->contactNumber;
			$data->gender = $request->gender;
			$data->blood = $request->patientBlood;
			//print_r($data);
			$data->save();
			// insert patient id
			$a = $data->id;
			$ran = RAND(1000,9999);
			$patient_id = 'PA-'.$a.$ran;
			//echo $patient_id;
			$mo = Patient::find($a);
			$mo->patient_id = $patient_id;
			$mo->save();
			$save_id = $data->id;
		}else{
			$save_id = $request->checkExist;
		}

        $test_new = new InvoiceTest;
		// $test_new->patient_id = $save_id;
		// $test_new->vat = $vat;
		// $test_new->discount = $discount;
		// $test_new->total = $request->total;
		// $test_new->paid = $request->paid;
		// $test_new->paid_status = $paid_status;
		// $test_new->created_by = $request->cr_name;
		// $test_new->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = InvoiceTest::findOrFail($id);
		$test_d=InvoiceTestDetail::where('test_id',$id)->get();
		return view('testinvoice.show',compact('data','test_d'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceTest $invoiceTest)
    {
		$test_d=InvoiceTestDetail::all();
		return view('testinvoice.edit',compact('invoiceTest','test_d'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceTest $invoiceTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceTest $invoiceTest)
    {
        $invoiceTest->delete();
        Toastr::warning('Invoice Deleted Permanently!');
        return redirect()->back();
    }




    public function getpatient(Request $request){
        $get_patient=Patient::where('patient_id',$request->id)->get();
        return $get_patient;

    }
    public function get_test(Request $request)
    {
        $get_test = Test::where('test_category_id',$request->id)->get();
        return $get_test;
    }

    public function get_test_price(Request $request){
		$get_test = Test::find($request->id);
		return $get_test;
	}
}
