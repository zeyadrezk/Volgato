<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Country;
use App\Models\product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	use ApiTrait;
	
	public function index(Request $request)
	{
		$lang = $request->lang;
		$country_id = $request->country_id;
		$products = product::where('country_id',$country_id)->get();
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
				'total_rate'=>$item['total_rate'],
			];
		}, $products);
		return $this->ApiResponse(200,'success',null, array('products'=> $products));
	}
	
		public function catproducts(Request $request)
	{
		$lang = $request->lang;
	 
		$products = product::where('category_id',$request->category_id)->get();
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
				'total_rate'=>$item['total_rate'],
			];
		}, $products);
		return $this->ApiResponse(200,'success',null, array('products'=> $products));
	}
	
	 
	
	
}
