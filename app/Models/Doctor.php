<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;

class Doctor extends Model
{
    use HasFactory,softDeletes;

    public function employee()
	{
		return $this->belongsTo(Employee::class,'employee_id','id');
	}
    public function designation()
	{
		return $this->belongsTo(Designation::class,'designation_id','id');
	}
    public function department()
	{
		return $this->belongsTo(Department::class,'department_id','id');
	}
    public function patientAdmit()
	{
		return $this->hasMany(PatientAdmit::class);
	}
    public function birth()
	{
		return $this->hasMany(Birth::class);
	}
}
