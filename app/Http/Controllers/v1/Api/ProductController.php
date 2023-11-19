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
		$country = $request->country ;
		$country_id= Country::where('name',$country)->first();
		$products = product::with('productTrans')->where('country_id',$country_id->id)->get();
		return $this->ApiResponse(200,'Services',null, $products);
	}
}
