<?php
	
	use App\Http\Controllers\v1\Api\ApiController;
	use App\Http\Controllers\v1\Api\CountryController;
	use App\Http\Controllers\v1\Api\HomeController;
	use App\Http\Controllers\v1\Api\ProductController;
	use App\Http\Controllers\v1\Api\ServiceController;
	use App\Http\Controllers\v1\Api\UserController;
	use App\Http\Controllers\v1\static_pages\AboutApplicationController;
	use App\Http\Controllers\v1\static_pages\TermsCondtionsController;
	use App\Http\Controllers\v1\static_pages\WhoAreWeController;
		use App\Http\Controllers\v1\Api\MainController;
	use Illuminate\Support\Facades\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return 'zeyad';
});


	Route::get('/about_app',[AboutApplicationController::class,'AboutApplication'])->name('about_app');
	Route::get('/WhoAreWe',[WhoAreWeController::class,'WhoAreWe'])->name('WhoAreWe');
	Route::get('/TermsAndConditions',[TermsCondtionsController::class,'TermsConditions'])->name('TermsConditions');
	Route::get('/country/{lang}',[CountryController::class,'index'])->name('countries');
	Route::get('/getcat'    ,[MainController::class,'getcat'])->name('getcat');
	Route::get('/ProductsDetails/{lang}/{product_id}',[ApiController::class,'details_products'])->name('products.details');
	Route::get('/ProductRate/{lang}/{product_id}',[ApiController::class,'ProductRate'])->name('ProductRate');
	Route::get('/ServiceRate/{lang}/{service_id}',[ApiController::class,'ServiceRate'])->name('ServiceRate');
	Route::get('/getcatapp'    ,[ApiController::class,'getcatapp'])->name('getcatapp');
	Route::get('/ServicesDetails/{lang}/{service_id}',[ApiController::class,'details_service'])->name('details_service');
	Route::post('/addreview',[ApiController::class,'addreview'])->name('addreview')->middleware('auth:sanctum');
	Route::get('/Sale/{lang}',[ApiController::class,'Sale'])->name('Sale');
	Route::get('/cart/{lang}',[ApiController::class,'cart'])->name('cart')->middleware('auth:sanctum');
	Route::get('/deletecart/{lang}',[ApiController::class,'deletecart'])->name('deletecart');
	
	
	
	
	
	Route::group([
		'controller' => UserController::class,
		'middleware'=>'guest',
		'prefix' => 'user',
	], function () {
	Route::post('/login','login')->name('login');
	Route::get('/login','login')->name('login');
	Route::post('/register','register')->name('register');
	});
	
	
	Route::group([
		'controller' => ServiceController::class,
		'prefix' => 'Service',
		'as' => 'Service.',
	], function () {
	Route::post('/','index')->name('index');
	});
	
	
	Route::group([
		'controller' => ProductController::class,
		'prefix' => 'Product',
		'as' => 'Product.',
	], function () {
	Route::post('/','index')->name('index');
	Route::get('/catproducts','catproducts')->name('catproducts');
	
	});
	
	Route::group([
		'controller' => HomeController::class,
		'prefix' => 'home',
		'as' => 'home.',
	], function () {
	Route::post('/','index')->name('index');
	});
