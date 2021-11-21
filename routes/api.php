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
Route::post('/login',[App\Http\Controllers\api\AuthController::class,'login']);
Route::post('/register',[App\Http\Controllers\api\AuthController::class,'register']);
Route::post('/logout',[App\Http\Controllers\api\AuthController::class,'logout']);

require __DIR__.'/basic_data_routes/brands.php';
require __DIR__.'/laptops.php';
require __DIR__.'/processors.php';
require __DIR__.'/graphics.php';
require __DIR__.'/storages.php';
require __DIR__.'/system-builder.php';
require __DIR__.'/memories.php';
require __DIR__.'/powersupplies.php';
require __DIR__.'/motherboards.php';