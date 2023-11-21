<?php
	
	namespace App\Http\Controllers\v1\Api;
	
	use App\Http\Controllers\Controller;
	use App\Http\Traits\ApiTrait;
	use App\Models\Product;
	use App\Models\ProductRate;
	use App\Models\Service;
	use App\Models\ServiceRate;
	
	
	class ApiController extends Controller
	{
		use ApiTrait;
		
		public function details_products($lang, $product_id)
		{
			//select products with language ('ar','en')
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
					'advantages' => $item['advantages'],
					'short_description' => $item['short_description'][$lang],
					'description' => $item['description'][$lang],
					'details' => $item['details'][$lang],
					'quantity' => $item['quantity'],
					'total_rate' => $item['total_rate'],
				];
			}, $products);
			
			//select rates and evaluations with languages ('ar','en')
			$rates = ProductRate::all()->where('product_id', $product_id);
			$rates = json_decode($rates, true);
			$rates = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'],
					'productEvaluation' => $item['productEvaluation'][$lang],
					'rate' => $item['rate'],
				];
			}, $rates);
			$numbRate = ProductRate::where('product_id', $product_id)->count();
			$rateStars = ['1' => ProductRate::where('rate', 1)->where('product_id', $product_id)->count(), '2' => ProductRate::where('rate', 2)->where('product_id', $product_id)->count(), '3' => ProductRate::where('rate', 3)->where('product_id', $product_id)->count(), '4' => ProductRate::where('rate', 4)->where('product_id', $product_id)->count(), '5' => ProductRate::where('rate', 5)->where('product_id', $product_id)->count()];
			$totalRate = ProductRate::where('product_id', $product_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			$allRates = ['stars' => $rateStars, 'averageStars' => $avergeRate, 'numbRates' => $numbRate, 'rates' => $rates];
			
			return $this->ApiResponse(200, 'success', '', array('products' => $products, 'allRates' => $allRates));
			
		}
		
		public function ProductRate($lang, $product_id)
		{
			
			//select rates and evaluations with languages ('ar','en')
			$rates = ProductRate::all()->where('product_id', $product_id);
			$rates = json_decode($rates, true);
			$rates = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'],
					'productEvaluation' => $item['productEvaluation'][$lang],
					'rate' => $item['rate'],
				];
			}, $rates);
			$numbRate = ProductRate::where('product_id', $product_id)->count();
			$rateStars = ['1' => ProductRate::where('rate', 1)->where('product_id', $product_id)->count(), '2' => ProductRate::where('rate', 2)->where('product_id', $product_id)->count(), '3' => ProductRate::where('rate', 3)->where('product_id', $product_id)->count(), '4' => ProductRate::where('rate', 4)->where('product_id', $product_id)->count(), '5' => ProductRate::where('rate', 5)->where('product_id', $product_id)->count()];
			$totalRate = ProductRate::where('product_id', $product_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			$allRates = ['stars' => $rateStars, 'averageStars' => $avergeRate, 'numbRates' => $numbRate, 'rates' => $rates];
			
			return $this->ApiResponse(200, 'success', '', array('allRates' => $allRates));
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
			
//			select rates and evaluations with languages ('ar','en')
			$rates = ServiceRate::where('service_id', $service_id)->get();
			$rates = json_decode($rates, true);
			$rates = array_map(function ($item) use ($lang) {
				return [
					'id' => $item['id'],
					'name' => $item['name'],
					'serviceEvaluation' => $item['serviceEvaluation'][$lang],
					'rate' => $item['rate'],
				];
			}, $rates);
			$numbRate = ServiceRate::where('service_id', $service_id)->count();
			$rateStars = ['1' => ServiceRate::where('rate', 1)->where('service_id', $service_id)->count(), '2' => ServiceRate::where('rate', 2)->where('service_id', $service_id)->count(), '3' => ServiceRate::where('rate', 3)->where('service_id', $service_id)->count(), '4' => ServiceRate::where('rate', 4)->where('service_id', $service_id)->count(), '5' => ServiceRate::where('rate', 5)->where('service_id', $service_id)->count()];
			$totalRate = ServiceRate::where('service_id', $service_id)->sum('Rate');
			if ($numbRate == 0) {
				$avergeRate = 0;
			} else {
				$avergeRate = $totalRate / $numbRate;
			}
			$allRates = ['stars' => $rateStars, 'averageStars' => $avergeRate, 'numbRates' => $numbRate, 'rates' => $rates];
			
			return $this->ApiResponse(200, 'success', '', array('services' => $services, 'allRates' => $allRates));
			
			
		}
		
	}
