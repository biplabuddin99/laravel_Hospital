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

    public function employees()
	{
		return $this->belongsTo(Employee::class);
	}
    public function departments()
	{
		return $this->belongsTo(Department::class);
	}
    public function designations()
	{
		return $this->belongsTo(Designation::class);
	}
}
