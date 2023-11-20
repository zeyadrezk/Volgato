<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\country;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Traits\ApiTrait;


class HomeController extends Controller
{
		use ApiTrait;
		
	public function index(Request $request)
	{
		$lang = $request->lang;
		$country= Country::select('id')->where('name', 'like', '%'.$request->country.'%' )->first();
		$products = product::where('country_id',$country->id)->get();
		$products = json_decode($products, true);
		$products = array_map(function ($item) use ($lang) {
			return [
				'id' => $item['id'],
				'name' => $item['name'][$lang],
				'price' => $item['price'],
				'oldprice' => $item['oldprice'],
				'image' => $item['image'],
				'short_description' => $item['short_description'][$lang],
				'description' => $item['description'][$lang],
				'details' => $item['details'][$lang],
				'quantity' => $item['quantity'][$lang],
			];
		}, $products);
		
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
				'description' => $item['description'][$lang],
				'details' => $item['details'][$lang],
			];
		}, $services);
		
		$category  = Category::all();
		$all = [ 'services' => $services,'category '=>$category,'products' => $products];
		return $this->ApiResponse(200,'Services products',null, $all);
	
	}
}
