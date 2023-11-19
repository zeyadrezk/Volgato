<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Service extends Model
{
	use HasFactory;
	protected $fillable =[
		'price',
		'country_id',
	];
	
	
	public function country(){
		return $this->belongsTo(Country::class);
	}
	public function serviceTrans(){
		$lang= Lang::locale();
		
		return $this->hasMany(ServiceTrans::class)->where('lang','=',$lang);
	}
}
