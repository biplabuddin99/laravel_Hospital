<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Appointment;
use App\Models\PatientAdmit;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
	public function index()
	{
		// SELECT * FROM patient_admits  WHERE created_at LIKE '2022-12-13%'
// 		SELECT * FROM
// data
// WHERE datetime BETWEEN('2009-10-20 00:00:00' AND '2009-10-20 23:59:59')
// ORDER BY datetime DESC

		$ad_patient = PatientAdmit::Where('created_at', 'like', Date(date("Y-m-d")).'%');
        $test=Test::Where('created_at', 'like', Date(date("Y")).'%');
		$doc = Doctor::count();
		$appointment = Appointment::Where('created_at', 'like', Date(date("Y-m-d")).'%');
		$appointment_montn = Appointment::Where('created_at', 'like', Date(date("Y-m")).'%');
		$appointment_year = Appointment::Where('created_at', 'like', Date(date("Y")).'%');
        $nurse=Employee::where('role_id',3);
        $allemployee=Employee::count();
        $receptionist=Employee::where('role_id',4);
        $lab=Employee::where('role_id',5);
        $accountant=Employee::where('role_id',6);
        $pa_admit=PatientAdmit::count();
        $pa_list=Patient::count();
		// dd($ad_patient);
		return view('dashboard',compact('ad_patient','test','doc','appointment','appointment_montn','appointment_year','allemployee','nurse','receptionist','lab','accountant','pa_admit','pa_list'));
	}
}
