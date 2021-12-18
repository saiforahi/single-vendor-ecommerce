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
require __DIR__.'/cases.php';
require __DIR__.'/cpucoolers.php';
require __DIR__.'/monitors.php';
require __DIR__.'/keyboards.php';
require __DIR__.'/mouses.php';
require __DIR__.'/thermalpastes.php';
require __DIR__.'/speakers.php';
require __DIR__.'/ups.php';
require __DIR__.'/headphones.php';
require __DIR__.'/externalharddrives.php';
require __DIR__.'/webcams.php';
require __DIR__.'/opticaldrives.php';
require __DIR__.'/soundcards.php';
require __DIR__.'/wirelessnetworkadapters.php';
require __DIR__.'/wirednetworkadapters.php';
require __DIR__.'/casecooler.php';
require __DIR__.'/orders.php';