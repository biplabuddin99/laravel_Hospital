<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Test;

class TestCategory extends Model
{
    use HasFactory,softDeletes;


    public function test()
	{
		return $this->hasMany(Test::class);
	}
}
