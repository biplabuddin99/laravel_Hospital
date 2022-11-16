<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

class Shift extends Model
{
    use HasFactory;

    public function schedule_function()
    {
        return $this->hasMany(Schedule::class);
    }
}
