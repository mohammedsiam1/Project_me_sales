<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Brand\Index;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\Brands\BrandController;
use App\Http\Controllers\Admin\Colors\ColorController;
use App\Http\Controllers\Admin\Products\ProductController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

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

});

});