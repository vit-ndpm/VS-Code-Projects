<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Login and Register Routes 
Auth::routes();

// Front End Routes 
Route::get('/',[FrontEndController::class,'index']);
Route::get('/collections',[FrontEndController::class,'categories']);
Route::get('/collections/{category_slug}',[FrontEndController::class,'products']);
Route::get('/collections/product/{category_slug}/{product_slug}',[FrontEndController::class,'productView']);
Route::middleware(['auth'])->group(function(){
    Route::get('wishlist',[WishlistController::class,'index']);
    Route::get('cart',[CartController::class,'index']);
    Route::get('checkOut',[CheckoutController::class,'index']);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // Category Routes
    Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category/create',  'store');
        Route::get('/category/{category}/edit',  'edit');
        Route::put('/category/{category}',  'update');

    });
    Route::get('/brand', App\Http\Livewire\Admin\Brand\BrandCompo::class);

    // Product Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index');
        Route::get('/product/create', 'create');
        Route::post('/product/create',  'store');
        Route::get('/product/{product}/edit',  'edit');
        Route::post('/product/{product}',  'update');
        Route::get('/product/{product}/delete',  'destroy');
        Route::get('/product/{product}/remove',  'removeImage');
        Route::get('/productColorQty/{product}/remove',  'removeProdColorQty');
        //Route::get('/product/{product}/remove',  'removeImage');
        Route::post('product-color/{product_color_id}','updateProductColorQty');
    });
    // Color Routes
    Route::controller(ColorController::class)->group(function () {
        Route::get('/color', 'index');
        Route::get('/color/create', 'create');
        Route::post('/color/create',  'store');
        Route::get('/color/{color}/edit',  'edit');
        Route::post('/color/{color}',  'update');
        Route::get('/color/{color}/delete',  'destroy');
    });
    // Slider Routes
    Route::controller(SliderController::class)->group(function () {
        Route::get('/slider', 'index');
         Route::get('/slider/create', 'create');
         Route::post('/slider/create',  'store');
         Route::get('/slider/{slider}/edit',  'edit');
         Route::post('/slider/{slider}',  'update');
         Route::get('/slider/{slider}/delete',  'destroy');
    });
});
