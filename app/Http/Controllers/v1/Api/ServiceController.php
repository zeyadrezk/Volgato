<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Service;
use Carbon\Language;
use Illuminate\Http\Request;
use App\Http\Traits\ApiTrait;

class ServiceController extends Controller
{
	use ApiTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
		$country = $request->country ;
		$country_id= Country::where('name',$country)->first();
		$services = Service::with('serviceTrans')->where('country_id',$country_id->id)->get();
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
