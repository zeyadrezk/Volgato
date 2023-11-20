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
		
		$country = $request->country ;
		$country_id= Country::where('name',$country)->first();
		$products = product::where('country_id',$country_id->id)->get();
		$category  = Category::all();
		$services = Service::where('country_id',$country_id->id)->get();
		$all = [ 'services' => $services,'category '=>$category,'products' => $products];
		return $this->ApiResponse(200,'Services products',null, $all);
	
	}
}
