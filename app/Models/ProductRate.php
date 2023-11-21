<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class ProductRate extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'name',
			'productEvaluation',
			'comment',
			'rate',
			'commentDate',
			'product_id'
		
		];
		
		protected $casts = [
			'productEvaluation'=>'array',
			
		
		
		];
		protected $hidden = [
			'updated_at',
			'created_at',
		];
		
	}
