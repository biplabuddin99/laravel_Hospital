<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\PatientAdmit;

class Patient extends Model
{
    use HasFactory, softDeletes;



    public function patient_admit()
	{
		return $this->hasMany(PatientAdmit::class);
	}
}
