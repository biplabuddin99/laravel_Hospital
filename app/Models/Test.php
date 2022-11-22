<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\TestCategory;

class Test extends Model
{
    use HasFactory,softDeletes;



    public function test_category()
	{
		return $this->belongsTo(TestCategory::class,'test_category_id','id');
	}
}
