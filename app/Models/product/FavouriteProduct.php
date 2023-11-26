<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteProduct extends Model
{
    use HasFactory;
	 protected  $fillable =[
		'id',
		'user_id',
		'product_id',
	 ];
	
	protected $hidden = [
		'updated_at',
		'created_at',
	];
	
	
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
