<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Appointment;
use App\Models\PatientAdmit;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		$ad_patient = PatientAdmit::all();
		$doc = Doctor::count();
		$appointment = Appointment::count();
		// dd($ad_patient);
		// $u = Auth::user()->employ_id;
		// $user = employ_basic_model::findOrFail($u);
		// $inv_patient = Test::all();
		// $ad_patient = PatientAdmit::findOrFail('admit_id');
		// $patient = PatientModel::count('id');
		// $doc = Doctor::count('id');
		// $nurse = employ_basic_model::where('role_id',20)->count('employ_id');
		// $acc = employ_basic_model::where('role_id',21)->count('employ_id');
		// $re = employ_basic_model::where('role_id',22)->count('employ_id');
		// $lab = employ_basic_model::where('role_id',23)->count('employ_id');
		// $em = employ_basic_model::count('employ_id');
		//echo $app_patient;
		return view('dashboard',compact('ad_patient','doc','appointment'));
	}
}
