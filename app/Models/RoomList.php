<?php

namespace App\Models;

use App\Models\RoomCategory;
use App\Models\PatientAdmit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomList extends Model
{
    use HasFactory,softDeletes;

    public function room_category()
	{
		return $this->belongsTo(RoomCategory::class,'room_category_id','id');
	}
    public function patient_admit()
    {
        return $this->hasMany(PatientAdmit::class,'room_list_id', 'id');
    }

}
