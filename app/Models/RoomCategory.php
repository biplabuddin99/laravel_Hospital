<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class RoomCategory extends Model
{
    use HasFactory,softDeletes;

    public function patien_admit()
    {
        return $this->hasMany(PatientAdmit::class);
    }
}
