<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Patient;
use App\Models\InvoiceTest;
use App\Models\TestCategory;
use Illuminate\Http\Request;

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
        $blood=Blood::all();
        return view('testinvoice.create',compact(['testcategory','blood']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceTest $invoiceTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceTest  $invoiceTest
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceTest $invoiceTest)
    {
        //
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
        //
    }

    public function getpatient(Request $request){
        $get_patient=Patient::where('patient_id',$request->id)->get();
        return $get_patient;

}
}
