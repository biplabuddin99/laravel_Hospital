<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Doctor;

class Operation extends Model
{
    use HasFactory, softDeletes;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id', 'id');
    }
}
