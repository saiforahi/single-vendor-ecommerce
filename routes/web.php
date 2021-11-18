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

Route::prefix('storages')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.storages.list');
    })->name('storage-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.storages.details');
    })->name('storage-details');
});
Route::prefix('graphics')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.graphics-cards.list');
    })->name('graphics-card-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.graphics-cards.details');
    })->name('graphics-card-details');
});
Route::prefix('processors')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.processors.list');
    })->name('processor-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.processors.details');
    })->name('processor-details');
});
Route::prefix('powersupply')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.power-supply.list');
    })->name('power-supply-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.power-supply.details');
    })->name('power-supply-details');
});

Route::prefix('cases')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.cases.list');
    })->name('case-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.cases.details');
    })->name('case-details');
});
Route::prefix('cpucoolers')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.cpu-coolers.list');
    })->name('cpu-cooler-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.cpu-coolers.details');
    })->name('cpu-cooler-details');
});

Route::prefix('motherboard')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.motherboards.list');
    })->name('motherboard-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.motherboards.details');
    })->name('motherboard-details');
});

Route::prefix('memory')->group(function(){
    Route::get('/list',function(){ //storage list view
        return view('pages.memories.list');
    })->name('memory-list');
    Route::get('/details',function(){ //storage list view
        return view('pages.memories.details');
    })->name('memory-details');
});



