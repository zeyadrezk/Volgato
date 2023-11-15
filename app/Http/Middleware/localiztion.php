<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class localiztion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
	public function handle($request, Closure $next)
	{
		// Check header request and determine localizaton
		$local = ($request->hasHeader(‘Accept_Language’)) ? $request->header(‘Accept_Language’) : ‘en’;
		// set laravel localization
		app()->setLocale($local);
		// continue request
		return $next($request);
	}
}
