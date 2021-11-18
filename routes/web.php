<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
})->name('home');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
Route::get('system-builder',function(){
    return view('pages.system-builder');
})->name('system-builder');
Route::get('pre-built',function(){
    return view('pages.pre-built');
})->name('pre-built');
Route::get('laptops',function(){
    return view('pages.laptops');
})->name('laptops');
Route::get('laptops/list/{type}',[App\Http\Controllers\api\LaptopController::class,'show_laptops'])->name('laptop-list');
Route::get('cart',[App\Http\Controllers\api\CartController::class,'show_cart_page'])->name('cart');

Route::get('storages/list',function(){ //storage list view
    return view('pages.storages');
})->name('storage-list');

Route::get('graphics/list',function(){ //storage list view
    return view('pages.graphics_cards');
})->name('graphics-card-list');

Route::get('powersupply/list',function(){ //storage list view
    return view('pages.power_supply');
})->name('power-supply-list');

Route::get('cases/list',function(){ //storage list view
    return view('pages.cases');
})->name('case-list');

Route::get('processors/list',function(){ //storage list view
    return view('pages.processors');
})->name('processor-list');

Route::get('cpu-cooler/list',function(){ //storage list view
    return view('pages.cpu-cooler');
})->name('cpu-cooler-list');

Route::get('motherboard/list',function(){ //storage list view
    return view('pages.motherboard');
})->name('motherboard-list');

Route::get('memory/list',function(){ //storage list view
    return view('pages.memory');
})->name('memory-list');