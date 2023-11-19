<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Product extends Model
{
    use HasFactory;
	protected  $fillable = [
		'price',
		'category_id',
		'country_id',
	];
	
	
	public function country(){
		return $this->belongsTo(Country::class);
	}
	public function category(){
		return $this->belongsTo(Category::class);
	}
	public function productTrans(){
		
		$lang= Lang::locale();
		
		return $this->hasMany(ProductTrans::class)->where('lang','=',$lang);
	}
}
