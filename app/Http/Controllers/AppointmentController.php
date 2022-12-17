<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appoint=Appointment::paginate(10);
        return view('appointment.appoint_index', compact('appoint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $depart = department::where('status',1)->orderBy('id','asc')->get();
        return view('appointment.appoint_create')->with('department',$depart);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $app=new Appointment;
            $app->patient_id=$request->id;
            $app->employee_id=$request->doctor_id;
            $app->phone=$request->patientPhone;
            $app->problem=$request->patientProblem;
            $app->appoint_date=$request->appoint_date;
            $app->serial=$request->serial;
            $app->status=1;
            $app->save();
            Toastr::success('Appointment add Successfully!');
            
            return redirect(route('appoint.index'));


        }catch(Exception $e){
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Appointment::findOrFail($id);
        return view('appointment.appoint_show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Appointment::findOrFail($id);
		$gender = $data->patient->gender;
		if($gender == 1){
			$s = 'Male';
		}elseif($gender == 2){
			$s = 'Female';
		}elseif($gender == 3){
			$s = 'Common';
		}else{
			$s = '';
		}
		
		return view('prescription.prescription_create',compact('data','s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::findOrFail($id)->delete();
        Toastr::warning('Appointment Deleted Permanently!');
        return redirect()->back();
    }
}
