<?php
	
	namespace App\Models\product;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class Category extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'name',
			'image',
		
		];
		protected $hidden = [
			'updated_at',
			'created_at',
		];
		
		protected $casts = [
			'name'=>'array',
		];
	}
