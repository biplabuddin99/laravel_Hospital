<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Blood;
use App\Models\Role;
use App\Models\Doctor;
use App\Models\Appointment;


class Employee extends Model
{
    use HasFactory, softDeletes;
	
	protected $primaryKey = "id";
	
	public function blood()
	{
		return $this->belongsTo(Blood::class);
	}
	
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
	
	public function doctor()
	{
		return $this->hasMany(Doctor::class);
	}
    public function appointment()
	{
		return $this->hasMany(Appointment::class);
	}

}
