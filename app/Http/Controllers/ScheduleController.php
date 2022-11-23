<?php

namespace App\Http\Controllers;

use App\Models\Days;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Shift;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sched=Schedule::paginate(10);
        return view('schedule.index',compact('sched'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Role::all();
        $day=Days::all();
        $shift=Shift::all();
        return view('schedule.create',compact(['role','day','shift']));
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
            if($request->day_id){
                foreach($request->day_id as $key => $value){
                    $data = new Schedule;
                    $data->employee_id = $request->u_name;
                    $data->day_id = $request->day_id[$key];
                    $data->shift_id = $request->shift_id[$key];
                    $data->status = $request->status;
                    $data->save();
                } 
                return redirect(route('schedule.index'))->with("data saved");
            }else{
                return back()->withInput()->with("please try again");
            }
           
        }catch(Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Employee::where('role_id',$request->id)->get();
		return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->back();
    }
}
