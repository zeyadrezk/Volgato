<?php
	
	namespace App\Http\Controllers\v1\Api;
	
	use App\Http\Controllers\Controller;
	use App\Http\Traits\ApiTrait;
	use App\Models\Country;
	use App\Models\Product;
	use App\Models\ProductRate;
	use Illuminate\Http\Request;
	
	
	class ApiController extends Controller
	{
		use ApiTrait;
		
		public function details_products(Request $request)
		{
			//select products with language ('ar','en')
			$lang = $request->lang;
			$products = product::where('id',$request->product_id)->get();
			$products = json_decode($products, true);
			$products = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'][$lang],
					'price' => $item['price'],
					'oldprice' => $item['oldprice'],
					'image' => $item['image'],
					'secondImage' => $item['secondImage'],
					'advantages' => $item['advantages'],
					'short_description' => $item['short_description'][$lang],
					'description' => $item['description'][$lang],
					'details' => $item['details'][$lang],
					'quantity' => $item['quantity'],
					'total_rate'=>$item['total_rate'],
				];
			}, $products);
			
			//select rates and evaluations with languages ('ar','en')
			$rates = ProductRate::all();
			$rates = json_decode($rates, true);
			$rates = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'user_id' => $item['user_id'],
					'productEvluation' => $item['productEvluation'][$lang],
				];
			}, $rates);
			$numbRate = ProductRate::count();
			$rateStars = ['1'=>ProductRate::where('rate',1)->count(), '2'=>ProductRate::where('rate',  2)->count(), '3'=>ProductRate::where('rate',3)->count(), '4'=>ProductRate::where('rate',4)->count(), '5'=>ProductRate::where('rate',5)->count()];
			$totalRate = ProductRate::sum('Rate');
			$avergeRate = $totalRate / $numbRate ;
			
			$allRates = ['stars'=>$rateStars ,'averageStars'=>$avergeRate,'numbRates'=>$numbRate,'rates'=> $rates];
			
			
			return $this->ApiResponse(200,'success','',array('products' => $products, 'allRates' => $allRates));
			
		}
		
		
		
		
		
	}
