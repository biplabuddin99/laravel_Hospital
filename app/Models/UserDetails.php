<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Blood;
use App\Models\User;
use App\Models\Role;

class UserDetails extends Model
{
    use HasFactory,softDeletes;
    public function blood()
	{
		return $this->belongsTo(Blood::class,'blood_id','id');
	}

	public function role()
	{
		return $this->belongsTo(Role::class,'role_id','id');
	}
	public function user()
	{
		return $this->belongsTo(User::class,'user_id','id');
	}
}
