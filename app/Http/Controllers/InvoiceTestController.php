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
use DB;
use Session;

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
        try{
            DB::beginTransaction();
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



            /*-------for total field---------*/
            $price = 0;
            $inv_list_id = $request->inv_list_id;
            foreach($inv_list_id as $li_id){
                $data = Test::find($li_id);
                $price += $data->price;
            }

            $vat = ($request->vat/100)*$price;
            $discount = ($request->discount/100)*$price;

            /*----if grand total and paid are equal paid status will be 0---*/
            $grand_total = (int)(($price+$vat)-$discount); // make it decimal less

            $paid_status = 0;

            if($request->paid == $grand_total){
                $paid_status = 1;
            }


            // InvoiceTest summary
            $test_new = new InvoiceTest;
            $test_new->patient_id = $save_id;
            $test_new->vat = $vat;
            $test_new->discount = $discount;
            $test_new->total = $request->total;
            $test_new->paid = $request->paid;
            $test_new->paid_status = $paid_status;
            $test_new->created_by = Session::get('userId');
            $test_new->updated_by = Session::get('userId');
            $test_new->save();

            foreach($inv_list_id as $id){
                $details = new InvoiceTestDetail;
                $details->invoice_test_id = $test_new->id;
                $details->test_id = $id;
                $details->save();
            }
            DB::commit();
            Toastr::success('Invoice Created Successfully!');
            return redirect('invoiceTest');
        }catch (Exception $e){
            dd($e);
            DB::rollBack();
            return back()->withInput();
        }
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
		$test_d=InvoiceTestDetail::where('invoice_test_id',$id)->get();
		return view('testinvoice.show',compact('data','test_d'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=InvoiceTest::findOrFail($id);
		$test_d=InvoiceTestDetail::where('invoice_test_id',$id)->get();
		return view('testinvoice.edit',compact('data','test_d'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = InvoiceTest::findOrFail($id);
		$data->paid = $request->paid;
		$data->paid_status = 0;

		if($request->paid == (int)($request->grand_total)){
			$data->paid_status = 1;
		}
		$data->save();
        Toastr::success('Invoice Updated Successfully!');
        return redirect('invoiceTest');
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
