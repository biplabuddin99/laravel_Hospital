<?php

namespace App\Models;

use App\Models\Test;
use App\Models\InvoiceTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceTestDetail extends Model
{
    use HasFactory,softDeletes;

    public function invoice_test()
	{
		return $this->belongsTo(InvoiceTest::class,'invoice_test_id','id');
	}
    public function test()
	{
		return $this->belongsTo(Test::class,'test_id','id');
	}
}
