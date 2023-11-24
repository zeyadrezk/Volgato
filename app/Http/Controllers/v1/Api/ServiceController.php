<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Country;
use App\Models\services\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
	use ApiTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
		$lang = $request->lang;
		$country_id = $request->country_id;
	    $services = Service::where('country_id',$country_id)->get();
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
		return $this->ApiResponse(200,'Services',null, $services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        //
    }
}
