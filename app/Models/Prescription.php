<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;


    protected $dates = ['deleted_at'];
	
	protected $primaryKey = 'id';


    public function get_appointment()
	{
		return $this->belongsTo(Appointment::class);
	}
        public function pres_medicine()
	{
		return $this->hasMany(Pres_medicine::class);
	}
}
