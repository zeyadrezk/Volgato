<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\country;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
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
			];
		}, $products);
		return $this->ApiResponse(200,'Services',null, $products);
	}
}
