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

Route::prefix('brands')->group(function(){
    Route::post('/create',[App\Http\Controllers\api\BrandsController::class,'create_brand']);
    Route::get('/all',[App\Http\Controllers\api\BrandsController::class,'get_all_brands']);
    Route::delete('/delete/{id}',[App\Http\Controllers\api\BrandsController::class,'delete_brand_entity']);
    Route::put('/update',[App\Http\Controllers\api\BrandsController::class,'update_brand_entity']);
    Route::post('/image/update',[App\Http\Controllers\api\BrandsController::class,'update_image']);
    Route::get('/details/{id}',[App\Http\Controllers\api\BrandsController::class,'details']);
});
