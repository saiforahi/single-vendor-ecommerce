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

Route::prefix('laptops')->group(function(){
    Route::post('/create',[App\Http\Controllers\api\LaptopController::class,'create']);
    Route::get('/all',[App\Http\Controllers\api\LaptopController::class,'get_all']);
    Route::delete('/delete/{id}',[App\Http\Controllers\api\LaptopController::class,'delete_laptop']);
    Route::put('/update',[App\Http\Controllers\api\LaptopController::class,'update']);
    Route::post('/image/update',[App\Http\Controllers\api\LaptopController::class,'update_image']);
    Route::get('/details/{id}',[App\Http\Controllers\api\LaptopController::class,'details']);
    Route::get('/operating-systems',[App\Http\Controllers\api\LaptopController::class,'all_added_operating_systems']);
});
