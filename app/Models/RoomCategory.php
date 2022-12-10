<?php

namespace App\Models;

use App\Models\PatientAdmit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class RoomCategory extends Model
{
    use HasFactory,softDeletes;

    public function patient_admit()
    {
        return $this->hasMany(PatientAdmit::class,'id','room_category_id');
    }
}
