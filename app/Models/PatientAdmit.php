<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Patient;
use App\Models\RoomCategory;
use App\Models\RoomList;

class PatientAdmit extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'admit_id';


			public function get_patient()
			{
				return $this->belongsTo(Patient::class);
			}
			public function room_category()
			{
				return $this->belongsTo(RoomCategory::class,'room_category_id','id');
			}
			public function get_roomList()
			{
				return $this->belongsTo(RoomList::class);
			}
			public function get_DoctorList()
			{
				return $this->belongsTo(Doctor::class);
			}
}
