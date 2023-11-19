<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class ServiceTrans extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'service_id',
			'name',
			'description',
			'short_description',
			'lang'
		];
		
		public function service()
		{
			return $this->belongsTo(service::class);
		}
		
	}
