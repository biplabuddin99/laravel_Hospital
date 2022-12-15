<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Days;
use App\Models\Blood;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Frontend;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor=Doctor::all();
        $blood=Blood::orderBy('id','asc')->get();
        $department=Department::where('status',1)->orderBy('id','asc')->get();
        return view('frontend.index',compact('doctor','blood','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $p=new Patient;
            $p->name=$request->patientName;
            $p->age=$request->patientAge;
            $p->phone=$request->patientPhone;
            $p->dob=$request->birth_date;
            $p->gender=$request->patientGender;
            $p->blood=$request->patientBlood;
            $p->address=$request->patientAddress;
            $p->problem=$request->patientProblem;
            $p->status=1;
            $p->save();

                //===insert patient id===//

            $p->patient_id= 'PA-'.$p->id.RAND(1000,9999);
            $p->save();
            //===insert id===//
            $pa = $p->patient_id;

            return redirect()->route('welcome.index')->with('pa',$p->patient_id);


        }catch(Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    public function get_patient(Request $request)
	{
		$data = Patient::where('patient_id',$request->id)->get();
		return $data;
	}
    public function getEmploy(Request $request)
	{
		$data = Doctor::where('department_id',$request->id)->get();
		$html ='';
		foreach($data as $row)
		{
			$html .='<option value='.$row->employee_id.'>'.'Dr. '.$row->employee->name.'</option>';
		}
		return $html;
	}
    public function getSchedule(Request $request)
	{
		$data = Schedule::where('employee_id',$request->id)->get();
		$html ='';
		foreach($data as $row)
		{
			$html .='<div><i class="fa fa-calendar"></i> '.$row->day->name.' ['.$row->shift->start.' to '.$row->shift->end.']</div>';

		}
		return $html;
	}


    public function getSerial(Request $request)
	{
		/*get day as saturday,sunday*/
        $date_now = new \DateTime();
        $date2    = new \DateTime($request->dat);
        if($date_now <= $date2){
            $day = date('l',strtotime($request->dat));
            $dayId = \App\Models\Days::where('name',$day)->first();
            $d = $dayId->id;
            $data = Schedule::where('employee_id',$request->id)->where('day_id',$d)->count();

            if($data <= 0)
            {
                return 'daYnotfind';
            }else{
                $row = Appointment::whereRaw('employee_id = ? and appoint_date = ?', [$request->id, $request->dat])->get();
                if($row == '')
                {
                    return 'rownotfind';
                }else
                {
                    return $row;
                }

            }
        }else{
            return 'daYnotfind';
        }
	}

    public function postApp(Request $request)
    {
        try{
            $app=new Appointment;
            $app->patient_id=$request->id;
            $app->employee_id=$request->doctor_id;
            $app->phone=$request->patientPhone;
            // $app->problem=$request->patientProblem;
            $app->appoint_date=$request->appoint_date;
            $app->serial=$request->serial;
            $app->status=1;
            $app->save();
                // return redirect()->back();
            $a = $app->id;
            $data = Appointment::findOrFail($a);
            return view('frontend.appoint_view',compact('data'));

        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
