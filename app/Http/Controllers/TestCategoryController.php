<?php

namespace App\Http\Controllers;

use App\Models\TestCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class TestCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testcat=TestCategory::all();
        return view('testCategory.index',compact('testcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testCategory.create');
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
        $testcat=new TestCategory;
        $testcat->name=$request->testCategoryName;
        $testcat->status=$request->status;
        $testcat->save();
        Toastr::success('Report Created Successfully!');
        return redirect(route('testCategory.index'));
            
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestCategory  $testCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TestCategory $testCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\testCategory  $testCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCategory $testCategory)
    {
        return view('testCategory.edit',compact('testCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestCategory  $testCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestCategory $testCategory)
    {
        try{
        $testcat=$testCategory;
        $testcat->name=$request->testCategoryName;
        $testcat->status=$request->status;
        $testcat->save();
        Toastr::info('Updated Successfully!');
        return redirect(route('testCategory.index'));

        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestCategory  $testCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCategory $testCategory)
    {
        $testCategory->delete();
        Toastr::warning('Report Deleted!');
        return redirect()->back();
    }
}
