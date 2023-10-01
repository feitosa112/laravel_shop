<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $categories=CategoryModel::take(14)->get();
    return view('welcome',['categories'=>$categories]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::controller(CategoryController::class)->prefix('/cat')->group(function(){

    Route::get('/allCategories','getAllCategories')->name('allCategories');

});



Route::controller(ProductController::class)->group(function(){

    Route::get('/category/{id}','thisCategory')->name('thisCategory');

    Route::get('/subcategory/{id}','thisSubCategory')->name('thisSubCategory');

    Route::get('/thisProduct/{id}','getThisProduct')->name('thisProduct');

    Route::get('/cart/{id}','addToCart')->name('addToCart');

    Route::get('/cart','cartView')->name('cartView');

    Route::get('/delete/{id}','deleteFromCart')->name('deleteFromCart');

});
