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
	
	
	
	
	
	
	
	
	
	
	Route::group([
		'controller' => ApiController::class,
	], function () {
		//product routes
		Route::get('/getcat/{lang}'    ,'GetCategory')->name('GetCategory');
		Route::get('/ProductsDetails/{lang}/{product_id}','details_products')->name('products.details');
		Route::get('/ProductRate/{lang}/{product_id}','ProductRate')->name('ProductRate');
		
		//services routes
		Route::get('/ServiceRate/{lang}/{service_id}','ServiceRate')->name('ServiceRate');
		Route::get('/ServicesDetails/{lang}/{service_id}','details_service')->name('details_service');
		
		Route::post('/addreview','AddReview')->name('AddReview')->middleware('auth:sanctum');
		Route::get('/Sale/{lang}','Sale')->name('Sale');
		
		
		//cart routes
		Route::get('/cart/{lang}','cart')->name('cart')->middleware('auth:sanctum');
		Route::delete('/deleteCart','deleteCart')->name('deleteCart')->middleware('auth:sanctum');
		Route::delete('/deleteCartItem','deleteCartItem')->name('deleteCartItem')->middleware('auth:sanctum');
		Route::put('/ChangeQuantityItem','ChangeQuantityItem')->name('ChangeQuantityItem')->middleware('auth:sanctum');
		
		Route::get('/FavouriteProduct/{lang}','FavouriteProduct')->name('FavouriteProduct')->middleware('auth:sanctum');
		Route::get('/orders/{lang}/{status}','orders')->name('orders')->middleware('auth:sanctum');
		
	});
	
	
	
	
	Route::group([
		'controller' => UserController::class,
		'prefix' => 'user',
	], function () {
	Route::match(['get','post'],'/login','login')->name('login')->middleware('guest');
	Route::post('/register','register')->name('register')->middleware('guest');
	Route::get('/editProfile','editProfile')->name('editProfile')->middleware('auth:sanctum');
	Route::put('/updateProfile','updateProfile')->name('updateProfile')->middleware('auth:sanctum');
	
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
