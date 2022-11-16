<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Days;
use App\Models\Shift;

class Schedule extends Model
{
    use HasFactory, softDeletes;
    

    public function get_date()
    {
        return $this->belongsTo(Days::class);
    }
    public function get_shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
