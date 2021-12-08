<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('cart')->group(function(){
    Route::get('/add-product/{product_id}',[App\Http\Controllers\api\CartController::class,'add_product_to_cart'])->name('add-product-to-cart');
    Route::get('/remove-product/{product_id}',[App\Http\Controllers\api\CartController::class,'remove_product_from_cart'])->name('remove-from-cart');
    Route::post('/update-quantity',[App\Http\Controllers\api\CartController::class,'update_item_quantity'])->name('update_cart_item_quantity');
});
