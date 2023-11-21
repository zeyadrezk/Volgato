<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Service;
use App\Models\Banner;

use Illuminate\Http\Request;
use App\Http\Traits\ApiTrait;


class HomeController extends Controller
{
		use ApiTrait;
		
	public function index(Request $request)
	{
		$lang = $request->lang;
		$country= Country::select('id')->where('id', 'like', '%'.$request->country.'%' )->first();
		$products = product::where('country_id',$country->id)->get();
		$product = json_decode($products, true);
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
		$services = Service::where('country_id',$country->id)->get();
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
		
		
		
		$category  = Category::all();
		$hot_product =product::where('country_id',$country->id)->where('price','>','oldprice')->orderby('oldPrice','asc')->get();
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
		
		$all = ['banners'=>$banners,'services' => $services,'category '=>$category,'products' => $products,'offerproducts'=>$product,'lastproducts'=>$hot_product];
		return $this->ApiResponse(200,'Services products',null, $all);
	
	}
}
