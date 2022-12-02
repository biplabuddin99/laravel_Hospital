<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Blood;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\InvoiceTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Employee extends Model
{
    use HasFactory, softDeletes;

	protected $primaryKey = "id";

	public function blood()
	{
		return $this->belongsTo(Blood::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function doctor()
	{
		return $this->hasMany(Doctor::class);
	}
    public function appointment()
	{
		return $this->hasMany(Appointment::class);
	}
    public function invoice_test()
	{
		return $this->hasMany(InvoiceTest::class);
	}

}
