<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Exception;
use App\Models\TestCategory;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test=Test::all();
        return view('test.index',compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testcat=TestCategory::get(['id','name']);
        return view('test.create', compact('testcat'));
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
        $t=new Test;
        $t->test_category_id=$request->testCategory;
        $t->name=$request->name;
        $t->price=$request->price;
        $t->description=$request->description;
        $t->status=$request->status;
        $t->save();
        return redirect(route('test.index'));
        
        
        }catch(Exception $e){
            //dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $testCategory=TestCategory::get(['id','name']);
        return view('test.edit',compact('test','testCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        try{
        $t=$test;
        $t->test_category_id=$request->testCategory;
        $t->name=$request->name;
        $t->price=$request->price;
        $t->description=$request->description;

        $t->status=$request->status;
        $t->save();
        return redirect(route('test.index'));

        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->back();
    }
}
