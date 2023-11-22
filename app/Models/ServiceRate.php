<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRate extends Model
{
    use HasFactory;
	protected $fillable = [
		'name',
		'serviceEvaluation',
		'comment',
		'rate',
		'commentDate',
		'service_id',
		'user_id'
	
	];
	
	protected $casts = [
		'serviceEvaluation'=>'array',
	
	
	
	];
	
	
	
	
	protected $hidden = [
		'updated_at',
		'created_at',
	];
}
