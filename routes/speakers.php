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

Route::prefix('speakers')->group(function(){
    Route::post('/create',[App\Http\Controllers\api\ProductController::class,'create']);
    Route::get('/all',[App\Http\Controllers\api\SpeakersController::class,'get_all']);
    Route::delete('/delete/{id}',[App\Http\Controllers\api\SpeakersController::class,'delete_laptop']);
    Route::put('/update',[App\Http\Controllers\api\SpeakersController::class,'update']);
    Route::post('/image/update',[App\Http\Controllers\api\SpeakersController::class,'update_image']);
    Route::get('/details/{id}',[App\Http\Controllers\api\SpeakersController::class,'details']);
    Route::get('/specification/list/{type}',[App\Http\Controllers\api\SpeakersController::class,'get_laptop_create_options']);

    Route::get('/images/{id}',[App\Http\Controllers\api\SpeakersController::class,'get_all_media']);

    
});
