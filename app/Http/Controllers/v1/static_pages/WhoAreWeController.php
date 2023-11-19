<?php

namespace App\Http\Controllers\v1\static_pages;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;

class WhoAreWeController extends Controller
{
	
	use ApiTrait;
	public function WhoAreWe()
	{
		return $this->ApiResponse(200,__('api.WhoAreWe_title'),null , __('api.WhoAreWe'));
		
	}
}
