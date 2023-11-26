<?php
	
	namespace App\Models\order;
	
	use App\Models\product\Product;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class OrderItems extends Model
	{
		use HasFactory;
		
		
		protected $fillable = [
			'order_id',
			'product_id',
			'quantity',
		
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
