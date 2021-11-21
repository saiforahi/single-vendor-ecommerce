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

Route::prefix('motherboards')->group(function(){
    Route::post('/create',[App\Http\Controllers\api\ProductsController::class,'add_motherboard']);
    Route::get('/all',[App\Http\Controllers\api\MotherBoardsController::class,'get_all']);
    Route::delete('/delete/{id}',[App\Http\Controllers\api\MotherBoardsController::class,'delete']);
    Route::put('/update',[App\Http\Controllers\api\MotherBoardsController::class,'update']);
    Route::post('/image/update',[App\Http\Controllers\api\MotherBoardsController::class,'update_image']);
    Route::get('/details/{id}',[App\Http\Controllers\api\MotherBoardsController::class,'show_details']);
    Route::get('/specification/list/{type}',[App\Http\Controllers\api\MotherBoardsController::class,'get_motherboard_create_options']);

    Route::get('/images/{id}',[App\Http\Controllers\api\MotherBoardsController::class,'get_all_media']);
});
