<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Shift;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shif=Shift::paginate(10);
        return view('shift.index',compact('shif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shift.create');
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
        // dd($request);
        $shift= new Shift;
        $shift->name=$request->ShiftName;
        $shift->start=$request->start_time;
        $shift->end=$request->end_time;
        $shift->status=1;
        $shift->save();
        Toastr::success('Shift Created Successfully!');
        return redirect(route('shift.index'));
        }catch(Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('shift.edit',compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        try{
            // dd($request);
            $s=$shift;
            $s->name=$request->ShiftName;
            $s->start=$request->start_time;
            $s->end=$request->end_time;
            $s->status=1;
            $s->save();
            Toastr::info('Shift Updated Successfully!');
            return redirect(route('shift.index'));
            }catch(Exception $e){
                dd($e);
                return back()->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        // $shift->delete();
        // return redirect()->back();
    }
}
