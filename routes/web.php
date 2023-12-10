<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;


Route::post(
    'stripe/webhook',
    [WebhookController::class, 'handleWebhook']
);
Auth::routes();

Route::get('/', function () {
    $categories=CategoryModel::take(14)->get();
    $categories1=CategoryModel::with('subcategories')->get();
    $results = ProductModel::paginate(6);
    $paginator = $results->links()->paginator;
    return view('welcome',['categories'=>$categories,'results'=>$results,'paginator'=>$paginator,'categories1'=>$categories1]);
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
    Route::get('/payment/{id}','showPaymentForm')->name('payment.form');
    Route::get('/delete/{id}','deleteFromCart')->name('deleteFromCart');
    Route::get('/search','search')->name('search');
    Route::get('/delete-product/{id}','deleteProduct')->name('deleteProduct');
    Route::get('/edit-product-view/{id}','editProductView')->name('editProductView');
    Route::post('/update/{id}','updateProduct')->name('update');
    Route::get('/delete-image/{name}','deleteImage')->name('deleteImage');
    Route::get('add-new-product','addNewProductView')->name('addNewProduct');
    Route::post('/add-new-product','addNewProduct')->name('addNewProduct');

});
Route::controller(OrderController::class)->group(function(){
    Route::get('/order','orderExecute')->name('orderExecute');
    Route::get('/order/{id}','orderExecuteNow')->name('orderExecuteNow');
    Route::get('/my-order','getMyOrder')->name('myOrder');
    Route::get('/admin/newOrder','newOrder')->name('newOrder');
    Route::get('/admin/newOrder-view/{id}','newOrderView')->name('newOrderView');
    Route::get('/send-product/{id}','sendProduct')->name('send-product');

});



Route::post('sendMsg/{id}',[MessageController::class,'sendMsg'])->name('sendMsg')->middleware('auth');
Route::get('exchange-rate',[CurrencyController::class,'getCurrency'])->name('exchangeRate');
Route::get('/todays-exchange-rate',[CurrencyController::class,'todaysExchangeRate'])->name('todaysExchangeRate');

Route::post('/payment/process/{id}', 'PaymentController@processPayment')->name('payment.process');


