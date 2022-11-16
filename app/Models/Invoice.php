<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
	protected $primaryKey = 'id';

    public function get_patient()
	{
		return $this->belongsTo(Patient::class);
	}
}
