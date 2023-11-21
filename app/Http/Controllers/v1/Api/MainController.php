<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
	use ApiTrait;
	
	public function getcat(Request $request)
	{
		$lang = $request->lang;
	 
		$categories = Category::get();
	//	$products = json_decode($products, true);
// 		$products = array_map(function ($item) use ($lang) {
// 			return [
// 				'id' => $item['id'],
// 				'name' => $item['name'][$lang],
// 				'image' => $item['image'],
// 			];
// 		}, $products);
		return $this->ApiResponse(200,'success',null, array('listcategories'=> $categories));
	}
}
