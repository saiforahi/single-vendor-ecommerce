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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/logout',[App\Http\Controllers\Api\AuthController::class,'logout']);

require __DIR__.'/basic_data_routes/brands.php';
require __DIR__.'/laptops.php';
require __DIR__.'/processors.php';
require __DIR__.'/graphics.php';
require __DIR__.'/storages.php';
require __DIR__.'/system-builder.php';