<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Product extends Model
{
    use HasFactory;
	protected  $fillable = [
		'id',
		'name',
		'price',
		'oldprice',
		'image',
		'short_description',
		'description',
		'quantity',
		'category_id',
		'country_id',
	];
	
	protected $casts = [
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
	public function category(){
		return $this->belongsTo(Category::class);
	}
	
}
