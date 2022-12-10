<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Employee;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Patient;
use App\Models\Department;

class Appointment extends Model
{
    use HasFactory, softDeletes;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'employee_id','employee_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'employee_id','employee_id');
    }
    // public function prescription()
	// {
	// 	return $this->hasMany('App\prescription_model','prescription_id','prescription_id');
	// }
}
