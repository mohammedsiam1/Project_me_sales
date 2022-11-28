<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Brand\Index;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Admin\Brands\BrandController;
use App\Http\Controllers\Admin\Colors\ColorController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\Order\OrderAdminController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Frontend\FrontCategoriesController;

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
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

Auth::routes();
Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index']);

    // Routes For Backend
Route::prefix('admin/')->middleware('auth','isAdmin')->group(function (){
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('categories', CategoriesController::class);
    Route::get('brands', Index::class);
    Route::get('brands/edit/{brand}', [BrandController::class,'edit'])->name('brand.edit');
    Route::resource('products', ProductController::class);
    Route::get('products/delete/{id}', [ProductController::class,'destroy'])->name('products.delete');
    Route::get('deleteImage/{id}', [ProductController::class,'deleteImageProduct'])->name('deleteImage');
    Route::post('product-color/{id}', [ProductController::class,'updateColor']);
    Route::post('delete-product-color/{id}', [ProductController::class,'deleteColor']);
    Route::resource('colors', ColorController::class);
    Route::resource('sliders', SliderController::class);
    Route::get('delete/Color/{id}', [ColorController::class,'destroy'])->name('delete.color');
    Route::get('order_panel', [OrderAdminController::class,'index'])->name('order.admin');
    Route::get('show/order_panel/{id}', [OrderAdminController::class,'show'])->name('show.order.admin');
    Route::put('show/update/{id}', [OrderAdminController::class,'updateOrder'])->name('update.order');
    Route::get('show/invoices/{id}', [OrderAdminController::class,'show_invoices'])->name('order_show_invoices.admin');
    Route::get('download/invoices/{id}', [OrderAdminController::class,'download_invoices'])->name('order_download_invoices.admin');

    


});

    // Route For Frontend
    Route::prefix('user/')->group(function (){
        Route::resource('category', FrontCategoriesController::class);
        Route::get('showProduct/{category_slug}/{product_slug}', [FrontCategoriesController::class,'showProduct']);
        Route::get('new-arrivals', [FrontendController::class,'newArrivals'])->name('new.arrivals');
        Route::get('feature', [FrontendController::class,'feature'])->name('feature');
    });
    Route::middleware('auth')->group(function (){
    Route::get('whishlist', [WishListController::class,'index'])->name('whishlist');
    Route::get('cart', [CartController::class,'cart'])->name('cart');

  

    Route::get('checkout', [CheckoutController::class,'index'])->name('checkout');
    Route::get('thank_you', [FrontendController::class,'thank_you'])->name('thank.you');
    Route::get('order', [OrderController::class,'index'])->name('order');
    Route::get('show/{id}', [OrderController::class,'show'])->name('show.order');
    
});
});