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
Route::get('/remember-what-you-are-doing/migrate-refresh-seed', function () {
    $exitCode = Artisan::call('migrate:refresh --seed');
    return 'Application migrations refreshed with seeding';
});
Route::get('/storage-link', function () {
    $exitCode = Artisan::call('storage:link');
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
    Route::get('/list',[App\Http\Controllers\api\StoragesController::class,'show_list'])->name('storage-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\StoragesController::class,'show_details'])->name('storage-details');
});
Route::prefix('graphics')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\GraphicsController::class,'show_list'])->name('graphics-card-list');
    Route::get('/details/{id}',function(){ //storage list view
        return view('pages.graphics-cards.details');
    })->name('graphics-card-details');
});
Route::prefix('processors')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\ProcessorsController::class,'show_list'])->name('processor-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\ProcessorsController::class,'show_details'])->name('processor-details');
});
Route::prefix('powersupply')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\PowerSupplyController::class,'show_list'])->name('power-supply-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\PowerSupplyController::class,'show_details'])->name('power-supply-details');
});
Route::prefix('casing')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\CasesController::class,'show_list'])->name('case-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\CasesController::class,'show_details'])->name('case-details');
});
Route::prefix('cpucooler')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\CpuCoolerController::class,'show_list'])->name('cpu-coolers-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\CpuCoolerController::class,'show_details'])->name('cpu-coolers-details');
});


Route::prefix('motherboard')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\MotherBoardsController::class,'show_list'])->name('motherboard-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\MotherBoardsController::class,'show_details'])->name('motherboard-details');
});
Route::prefix('memory')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\MemoriesController::class,'show_list'])->name('memory-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\MemoriesController::class,'show_details'])->name('memory-details');
});
Route::prefix('monitor')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\MonitorsController::class,'show_list'])->name('monitor-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\MonitorsController::class,'show_details'])->name('monitor-details');
});

Route::prefix('system-builder')->group(function(){
    Route::get('/add-processor/{processor_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_processor_web'])->name('add-processor-to-system');
    Route::get('/remove-processor',[App\Http\Controllers\api\SystemBuilderController::class,'remove_processor_web'])->name('remove-processor-from-system');
    Route::get('/add-storage/{storage_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_storage_web'])->name('add-storage-to-system');
    Route::get('/remove-storage',[App\Http\Controllers\api\SystemBuilderController::class,'remove_storage_web'])->name('remove-storage-from-system');
    Route::get('/add-memory/{memory_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_memory_web'])->name('add-memory-to-system');
    Route::get('/remove-memory',[App\Http\Controllers\api\SystemBuilderController::class,'remove_memory_web'])->name('remove-memory-from-system');
});