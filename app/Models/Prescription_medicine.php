<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Prescription_medicine extends Model
{
    use HasFactory, softDeletes;

    public function prescription()
	{
		return $this->belongsTo(Prescription::class);
	}
}
