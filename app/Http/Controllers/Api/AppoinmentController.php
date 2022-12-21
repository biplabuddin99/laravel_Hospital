<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Exception;
use App\Models\Doctor;
use App\Models\Blood;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    public function registration(Request $request)
    {
        try{
            $p=new Patient;
            $p->name=$request->name;
            $p->age=$request->age;
            $p->phone=$request->phone;
            $p->dob=$request->dob;
            $p->gender=$request->gender1?$request->gender1:$request->gender2;
            $p->blood=$request->blood;
            $p->address=$request->address;
            $p->problem=$request->problem;
            $p->status=1;
            $p->save();
            //===insert patient id===//
            $p->patient_id= 'PA-'.$p->id.RAND(1000,9999);
            $p->save();

            return response ($p);

        }catch(Exception $e){
            return response ($e);
        }
    }

    public function get_patient(Request $request)
	{
		$data = Patient::where('patient_id',$request->id)->get();
		return $data;
	}
    public function getBlood()
	{
		return Blood::orderBy('id','asc')->get();
    
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
    public function show($id)
    {
		$doctor = Doctor::findOrFail($id);
		return view('frontend.doctor_show',compact('doctor'));
    }

}
