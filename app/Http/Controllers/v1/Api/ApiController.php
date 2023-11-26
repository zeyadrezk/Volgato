<?php
	
	namespace App\Http\Controllers\v1\Api;
	
	use App\Http\Controllers\Controller;
	use App\Http\Traits\ApiTrait;
	use App\Models\cart\Cart;
	use App\Models\cart\CartItem;
	use App\Models\order\order;
	use App\Models\product\Category;
	use App\Models\product\FavouriteProduct;
	use App\Models\product\Product;
	use App\Models\product\ProductFeature;
	use App\Models\product\ProductRate;
	use App\Models\services\Service;
	use App\Models\services\ServiceRate;
	use App\Models\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Session;
	
	class ApiController extends Controller
	{
		use ApiTrait;
		
		public function GetCategory($lang)
		{
			
			
			$categories = Category::get();
			$categories = json_decode($categories, true);
			$categories = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'][$lang],
					'image' => $item['image'],
				];
			}, $categories);
			return $this->ApiResponse(200, 'success', null, array('listcategories' => $categories));
			
		}
		
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
		
		
		public function AddReview(Request $request)
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
			$products = Product::whereColumn('oldprice', '>', 'price')
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
			
			return $this->ApiResponse(200, 'success', null, array('products' => $products));
		}
		
		public function cart($lang)
		{
			$cart = Cart::with('items.product')
				->where('user_id', auth()->user()->id)
				->get();
			if(empty($cart)){
				Cart::create([
					'user_id' => auth()->user()->id,
				]);
			}
			$newitems = [];
			foreach ($cart[0]->items as $items) {
				$items = json_decode($items, true);
				$items['product']['name'] = $items['product']['name'][$lang];
				$items['product']['short_description'] = $items['product']['short_description'][$lang];
				$items['product']['description'] = $items['product']['description'][$lang];
				$items['product']['details'] = $items['product']['details'][$lang];
				$newitems[] = $items;
			}
			$cart = json_decode($cart, true);
			array_replace($cart[0]['items'] = $newitems);
			
			return $this->ApiResponse(200, 'success', null, array('cart' => $cart));
			
		}
		
		public function deleteCart(Request $request)
		{
			$cart_id = $request->cart_id;
			if (isset($cart_id)) {
				$cart = Cart::where('id', $cart_id)->first();
				if ($cart->user_id == Auth::user()->id) {
					CartItem::where('cart_id', $cart_id)->delete();
					return $this->ApiResponse(200, 'success', null, 'Products deleted successfully');
				} else {
					return $this->ApiResponse(401, 'fail');
					
				}
			}
		}
		
		
		public function deleteCartItem(Request $request)
		{
			$cart_id = $request->cart_id;
			$cart = Cart::where('id', $cart_id)->first();
			$item_id = $request->item_id;
			if (isset($cart_id) && isset($item_id) && $cart->user_id == Auth::user()->id) {
				$cartitem = CartItem::where('id', $item_id)->where('cart_id', $cart_id)->get();
				if (isset($cartitem)) {
					CartItem::where('id', $item_id)->where('cart_id', $cart_id)->delete();
					return $this->ApiResponse(200, 'success', null, 'Product deleted successfully');
					
				} else {
					return $this->ApiResponse(401, 'fail', 'unauthorized');
				}
			} else {
				return $this->ApiResponse(401, 'fail', 'unauthorized');
				
			}
			
		}
		
		public function ChangeQuantityItem(Request $request)
		{
			$item_id = $request->item_id;
			$increase = $request->increase;
			$decrease = $request->decrease;
			$cartitem = CartItem::where('id', $item_id)
				->first();
			$cart = Cart::where('id', $cartitem->cart_id)
			->first();
			$product = Product::where('id', $cartitem->product_id)
				->first();
			if (isset($increase) && isset($cartitem)&& $cart->user_id == Auth::user()->id) {
				if ($product->quantity >= ($cartitem->quantity + 1)) {
					$cartitem->quantity++;
					$cartitem->save();
					return $this->ApiResponse(200, 'success', null, 'quantity increased successfully');
				} else {
					return $this->ApiResponse(400, 'fail', null, 'no stock to increase the product');
				}
				
			} elseif (isset($decrease) && isset($cartitem) && $cart->user_id == Auth::user()->id) {
				if (($cartitem->quantity) > 0) {
					$cartitem->quantity--;
					$cartitem->save();
					return $this->ApiResponse(200, 'success', null, 'quantity decreased successfully');
				} if($cartitem->quantity <= 0)  {
					$cartitem->delete();
					return $this->ApiResponse(200, 'success', null, 'Product deleted successfully');
				}
				
			} else {
				return $this->ApiResponse(400, 'fail', 'unauthorized');
				
			}
			
			
		}
		
		
		public function FavouriteProduct($lang){
			$FavProducts = FavouriteProduct::with('product')
				->where('user_id', Auth::user()->id)
				->get();
			
			
			$newFav = [];
			foreach ($FavProducts as $items) {
				$items = json_decode($items, true);
				$items['product']['name'] = $items['product']['name'][$lang];
				$items['product']['short_description'] = $items['product']['short_description'][$lang];
				$items['product']['description'] = $items['product']['description'][$lang];
				$items['product']['details'] = $items['product']['details'][$lang];
				$newFav[] = $items;
			}
			$FavProducts = json_decode($FavProducts, true);
			array_replace($FavProducts= $newFav);
			
			return $this->ApiResponse(200, 'success', null, array('FavouriteProducts' => $FavProducts));
		}
		
		
		public function orders($lang,$status){
			
			$orders = order::with('items.product')
				->where('user_id', auth()->user()->id)
				->where('status',$status)
				->get();
			if(empty($orders)){
				order::create([
					'user_id' => auth()->user()->id,
				]);
			}
			$newitems = [];
			foreach ($orders[0]->items as $items) {
				$items = json_decode($items, true);
				$items['product']['name'] = $items['product']['name'][$lang];
				$items['product']['short_description'] = $items['product']['short_description'][$lang];
				$items['product']['description'] = $items['product']['description'][$lang];
				$items['product']['details'] = $items['product']['details'][$lang];
				$newitems[] = $items;
			}
			$orders = json_decode($orders, true);
			array_replace($orders[0]['items'] = $newitems);
			
			return $this->ApiResponse(200, 'success', null, array('cart' => $orders));
			
		}
		
	}
