<?php

namespace App\Http\Controllers\static_pages;

use App\Http\Controllers\Controller;

class TermsCondtionsController extends Controller
{
    public function TermsCondtions()
    {
	    return $this->ApiResponse(200, __('api.terms'),null , __('api.terms'));
	    
    }
}
