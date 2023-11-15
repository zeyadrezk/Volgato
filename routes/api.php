<?php
	
	use App\Http\Controllers\Api\LoginController;
	use App\Http\Controllers\Api\UserController;
	use App\Http\Controllers\static_pages\AboutApplicationController;
	use App\Http\Controllers\static_pages\TermsCondtionsController;
	use App\Http\Controllers\static_pages\WhoAreWeController;
	use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('/about_app',[AboutApplicationController::class,'AboutApplication'])->name('about_app');
Route::get('/WhoAreWe',[WhoAreWeController::class,'WhoAreWe'])->name('WhoAreWe');
Route::get('/TermsAndConditions',[TermsCondtionsController::class,'TermsCondtions'])->name('TermsCondtions');
	
	
	
	
	Route::group([
		'controller' => UserController::class,
		'middleware'=>'guest',
		'prefix' => 'user',
		'as' => 'user.',
	], function () {
	Route::post('/login','login')->name('login');
	Route::post('/register','register')->name('register');
	
	});
