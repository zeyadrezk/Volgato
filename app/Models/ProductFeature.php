<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    	use HasFactory;
		
		protected $fillable = [
			'name',
			'image',
			'product_id'
		];
		
 
		protected $hidden = [
			'updated_at',
			'created_at',
		];
}
