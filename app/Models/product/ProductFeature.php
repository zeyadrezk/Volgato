<?php

namespace App\Models\product;

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
		
		public function product(){
			$this->belongsTo(Product::class);
		}
}
