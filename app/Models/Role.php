<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Employee;
use App\Models\User;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    public function users(){
        return $this->hasMany(User::class);
    }
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
