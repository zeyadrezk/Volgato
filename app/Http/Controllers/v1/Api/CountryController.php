<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Country;

class CountryController extends Controller
{
	use ApiTrait;
    public function index($lang)
    {
		$country = Country::all();
		$country = json_decode($country, true);
	    $Country = array_map(function ($item) use ($lang) {
		    return [
			    'id' => $item['id'],
			    'name' => $item['name'][$lang],
		    ];
	    }, $country);
		
		
		return $this->ApiResponse(200,'success','',array('countries' => $Country));
		
		
    }
}
