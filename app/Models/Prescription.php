<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Appointment;
use App\Models\Prescription_medicine;

class Prescription extends Model
{
    use HasFactory, softDeletes;

    public function appointment()
	{
		return $this->belongsTo(Appointment::class,'appointment_id','id');
	}
	
	
	public function prescription_medicine()
	{
		return $this->hasMany(Prescription_medicine::class);
	}
}
