<?php

namespace App\Models;

use App\Models\Days;
use App\Models\Shift;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory, softDeletes;


    public function day()
    {
        return $this->belongsTo(Days::class,'day_id','id');
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class,'shift_id','id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
