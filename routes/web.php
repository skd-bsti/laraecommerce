<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function(){
        Route::get('dashboard', [DashboardController::class, 'index']);


       //__categories routes__//
        Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/index',  'index')->name('category.index');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::put('/category/update/{id}', 'update')->name('category.update');
        Route::get('/category/delete/{id}', 'destroy')->name('category.delete');

    });
       //__Product routes__//
       Route::controller(ProductController::class)->group(function () {
        Route::get('/product/index',  'index')->name('product.index');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::put('/product/update/{id}', 'update')->name('product.update');
        Route::get('/product/delete/{id}', 'destroy')->name('product.delete');

        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

    });

    //__Colors routes__//
    Route::controller(ColorController::class)->group(function () {
        Route::get('/color/index',  'index')->name('color.index');
        Route::get('/color/create', 'create')->name('color.create');
        Route::post('/color/store', 'store')->name('color.store');
        Route::get('/color/edit/{id}', 'edit')->name('color.edit');
        Route::put('/color/update/{id}', 'update')->name('color.update');
        Route::get('/color/delete/{id}', 'destroy')->name('color.delete');

        //Route::get('product-image/{product_image_id}/delete', 'destroyImage');

    });


    //__Brand routes__//

         Route::get('/brand/index',  App\Http\Livewire\Admin\Brand\Index::class)->name('brand.index');

});



