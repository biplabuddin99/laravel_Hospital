<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Blood extends Model
{
    use HasFactory;
    public function employee()
	{
		return $this->hasMany(Employee::class);
	}
}
