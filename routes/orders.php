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

Route::prefix('orders')->group(function(){
    Route::get('/all',[App\Http\Controllers\api\OrderController::class,'all_orders']);
    Route::get('/sales/{from}/{to}',[App\Http\Controllers\api\OrderController::class,'find_sales']);
    Route::get('/make-paid/{tracking_code}',[App\Http\Controllers\api\OrderController::class,'make_paid']);
});
