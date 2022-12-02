<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Patient;
use App\Models\Employee;
use App\Models\TestCategory;
use App\Models\InvoiceTestDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceTest extends Model
{
    use HasFactory,softDeletes;

    public function patient()
	{
		return $this->belongsTo(Patient::class,'patient_id','id');
	}
    public function test_category()
	{
		return $this->belongsTo(TestCategory::class);
	}
    public function test()
	{
		return $this->belongsTo(Test::class);
	}
    public function employee()
	{
		return $this->belongsTo(Employee::class,'created_by','id');
	}
    public function invoice_test_details()
	{
		return $this->hasMany(InvoiceTestDetail::class);
	}
}
