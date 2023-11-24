<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Banner;
use App\Models\Country;
use App\Models\product\Category;
use App\Models\product\Product;
use App\Models\services\Service;
use Illuminate\Http\Request;


class HomeController extends Controller
{
		use ApiTrait;
		
	public function index(Request $request)
	{
		$lang = $request->lang;
		$country_id = $request->id;
		
		$product = product::where('country_id',$country_id)
			->get();
		
		$product = json_decode($product, true);
		$product = array_map(function ($item) use ($lang) {
			return [
				'id' => $item['id'],
				'name' => $item['name'][$lang],
				'price' => $item['price'],
				'oldprice' => $item['oldprice'],
				'total_rate'=>$item['total_rate'],
				'image' => $item['image'],
				'short_description' => $item['short_description'][$lang],
			];
		}, $product);
		
		$banners  =Banner::get();
		$services = Service::where('country_id',$country_id)
			->get();
		$services = json_decode($services, true);
		$services = array_map(function ($item) use ($lang) {
			return [
				'id' => $item['id'],
				'name' => $item['name'][$lang],
				'price' => $item['price'],
				'oldprice' => $item['oldprice'],
				'image' => $item['image'],
				'short_description' => $item['short_description'][$lang],
			];
		}, $services);
		
		
		
		$category  = Category::get();
		$category = json_decode($category, true);
		
		$category = array_map(function ($item) use ($lang) {
			return [
				'id' => $item['id'],
				'name' => $item['name'][$lang],
				'image' => $item['image'],
			];
		}, $category);
		
		$hot_product =product::where('country_id',$country_id)
			->where('price','>','oldprice')
			->orderby('oldPrice','asc')
			->get();
		
		$hot_product = json_decode($hot_product, true);
		
		$hot_product = array_map(function ($item) use ($lang) {
			return [
				'id' => $item['id'],
				'name' => $item['name'][$lang],
				'price' => $item['price'],
				'oldprice' => $item['oldprice'],
				'image' => $item['image'],
				'short_description' => $item['short_description'][$lang],
			];
		}, $hot_product);
		
		$all = ['banners'=>$banners,
			'services' => $services,
			'category '=>$category,
			'products' => $product,
			'offerproducts'=>$product,
			'lastproducts'=>$hot_product];
		
		return $this->ApiResponse(200,'Services products',null, $all);
	
	}
}
