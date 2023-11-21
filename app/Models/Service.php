<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Service extends Model
{
	use HasFactory;
	protected $fillable =[
		'name',
		'price',
		'oldprice',
		'description',
		'short_description',
		'country_id',
		'image',
		'details',
		'total_rate',
		'duration',
	];
	protected $casts =[
		'name'=>'array',
		'description'=>'array',
		'short_description'=>'array',
		'details'=>'array',
	
	];
	
	protected $hidden = [
		'updated_at',
		'created_at',
	];
	
	public function country(){
		return $this->belongsTo(Country::class);
	}
	
}
