<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class UserDetails extends Model
{
    use HasFactory,softDeletes;
    public function blood()
	{
		return $this->belongsTo(Blood::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
