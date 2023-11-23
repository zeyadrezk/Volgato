<?php

namespace App\Http\Controllers\v1\static_pages;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;

class TermsCondtionsController extends Controller
{
	use ApiTrait;
    public function TermsConditions()
    {
	    return $this->ApiResponse(200, __('api.terms'),null , __('api.terms'));
	    
    }
}
