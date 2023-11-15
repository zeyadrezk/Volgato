<?php
	
	namespace App\Http\Controllers\static_pages;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
	use App\Http\Traits\ApiTrait;
	class AboutApplicationController extends Controller
	{
		use ApiTrait;
		public function AboutApplication()
		{
			return $this->ApiResponse(200, __('api.about_app_title'),null , __('api.about_app'));
		
		}
		
	}
