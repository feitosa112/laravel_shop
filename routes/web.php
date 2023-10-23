<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    $categories=CategoryModel::take(14)->get();
    $results = ProductModel::all();
    return view('welcome',['categories'=>$categories,'results'=>$results]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(CategoryController::class)->prefix('/cat')->group(function(){
    Route::get('/allCategories','getAllCategories')->name('allCategories');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/category/{id}','thisCategory')->name('thisCategory');
    Route::get('/subcategory/{id}','thisSubCategory')->name('thisSubCategory');
    Route::get('/thisProduct/{id}','getThisProduct')->name('thisProduct');
    Route::get('/cart/{id}','addToCart')->name('addToCart')->middleware('auth');
    Route::get('/cart','cartView')->name('cartView');
    Route::get('/delete/{id}','deleteFromCart')->name('deleteFromCart');
    Route::get('/search','search')->name('search');
    Route::get('/delete-product/{id}','deleteProduct')->name('deleteProduct');
    Route::get('/edit-product-view/{id}','editProductView')->name('editProductView');
    Route::post('/update/{id}','updateProduct')->name('update');
    Route::get('/delete-image/{id}','deleteImage')->name('deleteImage');
    Route::get('add-new-product','addNewProductView')->name('addNewProduct');
    Route::post('/add-new-product','addNewProduct')->name('addNewProduct');

});
Route::controller(OrderController::class)->group(function(){
    Route::get('/order','orderExecute')->name('orderExecute');
    Route::get('/my-order','getMyOrder')->name('myOrder');
    Route::get('/admin/newOrder','newOrder')->name('newOrder');
    Route::get('/admin/newOrder-view/{id}','newOrderView')->name('newOrderView');
    Route::get('/send-product/{id}','sendProduct')->name('send-product');
});

Route::post('sendMsg/{id}',[MessageController::class,'sendMsg'])->name('sendMsg')->middleware('auth');



