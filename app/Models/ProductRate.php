<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class ProductRate extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'user_id',
			'productEvluation',
			'comment',
			'rate',
			'commentDate',
		
		];
		
		protected $casts = [
			'productEvluation'=>'array',
			
		
		
		];
		protected $hidden = [
			'updated_at',
			'created_at',
		];
		
	}
