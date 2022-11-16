<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

class Days extends Model
{
    use HasFactory;

    protected $primaryKey= "day_id";

    public function schedule_function()
	{
		return $this->hasMany(Schedule::class);
    }

}