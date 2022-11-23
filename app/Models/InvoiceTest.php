<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Patient;
use App\Models\TestCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceTest extends Model
{
    use HasFactory,softDeletes;

    public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
    public function test_category()
	{
		return $this->belongsTo(TestCategory::class);
	}
    public function test()
	{
		return $this->belongsTo(Test::class);
	}
}
