<?php
	
	namespace App\Http\Controllers\v1\Api;
	
	use App\Http\Controllers\Controller;
	use App\Http\Traits\ApiTrait;
	use App\Models\Cart;
	use App\Models\CartItem;
	use App\Models\Product;
	use App\Models\ProductFeature;
	use App\Models\ProductRate;
	use App\Models\Service;
	use App\Models\ServiceRate;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Session;
	use function PHPUnit\Framework\returnValueMap;
	
	class ApiController extends Controller
	{
		use ApiTrait;
		
		public function details_products($lang, $product_id)
		{
			
			
			$numbRate = ProductRate::where('product_id', $product_id)->count();
			$totalRate = ProductRate::where('product_id', $product_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			$rateStars = ['key1' => ProductRate::where('rate', 1)->where('product_id', $product_id)->count(),
				'key2' => ProductRate::where('rate', 2)->where('product_id', $product_id)->count(),
				'key3' => ProductRate::where('rate', 3)->where('product_id', $product_id)->count(),
				'key4' => ProductRate::where('rate', 4)->where('product_id', $product_id)->count(),
				'key5' => ProductRate::where('rate', 5)->where('product_id', $product_id)->count()];
			
			
			$products = product::where('id', $product_id)->get();
			$products = json_decode($products, true);
			$products = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'][$lang],
					'price' => $item['price'],
					'oldprice' => $item['oldprice'],
					'image' => $item['image'],
					'secondImage' => $item['secondImage'],
					'short_description' => $item['short_description'][$lang],
					'description' => $item['description'][$lang],
					'details' => $item['details'][$lang],
					'quantity' => $item['quantity'],
				
				];
			}, $products);
			
			$ProductFeature = ProductFeature::all()->where('product_id', $product_id);
			
			$data = ['productfeature' => $ProductFeature, 'products' => $products, 'averageStars' => $avergeRate, 'numbRate' => $numbRate, 'total_start' => $rateStars];
			return $this->ApiResponse(200, 'success', '', $data);
			
		}
		
		public function ProductRate($lang, $product_id)
		{
			
			
			$rates = ProductRate::all()->where('product_id', $product_id);
			$numbRate = ProductRate::where('product_id', $product_id)->count();
			$totalRate = ProductRate::where('product_id', $product_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			
			
			$data['averageStars'] = $avergeRate;
			$data['numbRate'] = $numbRate;
			
			$rateStars = ['key1' => ProductRate::where('rate', 1)->where('product_id', $product_id)->count(),
				'key2' => ProductRate::where('rate', 2)->where('product_id', $product_id)->count(),
				'key3' => ProductRate::where('rate', 3)->where('product_id', $product_id)->count(),
				'key4' => ProductRate::where('rate', 4)->where('product_id', $product_id)->count(),
				'key5' => ProductRate::where('rate', 5)->where('product_id', $product_id)->count()];
			$data['total_start'] = $rateStars;
			
			if (count($rates) > 0) {
				foreach ($rates as $list_review) {
					$productlist['comment'] = $list_review->comment;
					$productlist['rate'] = $list_review->rate;
					$productlist['date'] = $list_review->created_at;
					$productlist['product_id'] = $list_review->product_id;
					$client_name = User::select("name")->where('id', $list_review->user_id)->first();
					$productlist['client_name'] = $client_name->name;
					$data['list'][] = $productlist;
				}
			} else {
				$data['list'] = [];
			}
			
			//$allRates = ['averageStars' => $avergeRate,'rates' => $rates];
			return $this->ApiResponse(200, 'success', '', $data);
			
		}
		
		
		public function ServiceRate($lang, $service_id)
		{
			
			
			$rates = ServiceRate::all()->where('service_id', $service_id);
			$numbRate = ServiceRate::where('service_id', $service_id)->count();
			$totalRate = ServiceRate::where('service_id', $service_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			
			
			$data['averageStars'] = $avergeRate;
			$data['numbRate'] = $numbRate;
			
			$rateStars = ['key1' => ServiceRate::where('rate', 1)->where('service_id', $service_id)->count(),
				'key2' => ServiceRate::where('rate', 2)->where('service_id', $service_id)->count(),
				'key3' => ServiceRate::where('rate', 3)->where('service_id', $service_id)->count(),
				'key4' => ServiceRate::where('rate', 4)->where('service_id', $service_id)->count(),
				'key5' => ServiceRate::where('rate', 5)->where('service_id', $service_id)->count()];
			$data['total_start'] = $rateStars;
			
			if (count($rates) > 0) {
				foreach ($rates as $list_review) {
					$productlist['comment'] = $list_review->comment;
					$productlist['rate'] = $list_review->rate;
					$productlist['date'] = $list_review->created_at;
					$productlist['service_id'] = $list_review->service_id;
					$client_name = User::select("name")->where('id', $list_review->user_id)->first();
					$productlist['client_name'] = $client_name->name;
					$data['list'][] = $productlist;
				}
			} else {
				$data['list'] = [];
			}
			
			return $this->ApiResponse(200, 'success', '', $data);
			
		}
		
		public function details_service($lang, $service_id)
		{
			
			//select products with language ('ar','en')
			$services = Service::where('id', $service_id)->get();
			$services = json_decode($services, true);
			$services = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'][$lang],
					'price' => $item['price'],
					'oldprice' => $item['oldprice'],
					'image' => $item['image'],
					'short_description' => $item['short_description'][$lang],
					'description' => $item['description'][$lang],
					'details' => $item['details'][$lang],
					'total_rate' => $item['total_rate'],
					'duration' => $item['duration'],
				];
			}, $services);
			
			
			$numbRate = ServiceRate::where('service_id', $service_id)->count();
			$rateStars = ['1' => ServiceRate::where('rate', 1)->where('service_id', $service_id)->count(),
				'2' => ServiceRate::where('rate', 2)->where('service_id', $service_id)->count(),
				'3' => ServiceRate::where('rate', 3)->where('service_id', $service_id)->count(),
				'4' => ServiceRate::where('rate', 4)->where('service_id', $service_id)->count(),
				'5' => ServiceRate::where('rate', 5)->where('service_id', $service_id)->count()];
			$totalRate = ServiceRate::where('service_id', $service_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			
			$allRates = ['stars' => $rateStars, 'averageStars' => $avergeRate, 'numbRates' => $numbRate];
			
			return $this->ApiResponse(200, 'success', '', array('services' => $services, 'allRates' => $allRates));
			
			
		}
		
		
		public function addreview(Request $request)
		{
			$lang = $request->lang;
			$review = ProductRate::create([
				'user_id' => 2,
				'comment' => $request->comment,
				'rate' => $request->rate,
				'product_id' => $request->product_id,
				'commentDate' => date("Y-m-d"),
			]);
			return $this->ApiResponse(200, 'success', '', array('review' => $review));
		}
		
		
		public function Sale($lang)
		{
			$products = Product::whereColumn('oldprice', '>','price')
				->orderby('oldprice', 'asc')
				->get();
			$products = json_decode($products, true);
			$products = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'][$lang],
					'price' => $item['price'],
					'oldprice' => $item['oldprice'],
					'image' => $item['image'],
					'secondImage' => $item['secondImage'],
					'short_description' => $item['short_description'][$lang],
					'description' => $item['description'][$lang],
					'details' => $item['details'][$lang],
					'quantity' => $item['quantity'],
					'total_rate' => $item['total_rate'],
				];
			}, $products);
			
			return $this->ApiResponse(200, 'success', null , array('products' => $products));
		}
		
		public function cart($lang){
			
			$cart = Cart::with('items.product')
				->where('user_id', Auth::user()->id)
				->get();
			$cart = json_decode($cart, true);
			
			
		
			
			
			return $this->ApiResponse(200, 'success', null , array('cart' => $cart));

		}
		
	}
