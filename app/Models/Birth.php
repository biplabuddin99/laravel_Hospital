<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Doctor;

class Birth extends Model
{
    use HasFactory, SoftDeletes;

    public function doctor()
	{
		return $this->belongsTo(Doctor::class,'doctor_id','id');
	}
}
