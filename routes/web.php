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
require __DIR__.'/cart.php';
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
Route::get('dashboard',function(){
    return view('pages.dashboard');
})->name('dashboard');
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
    Route::get('/list',[App\Http\Controllers\api\GraphicsController::class,'show_list'])->name('graphics-cards-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\GraphicsController::class,'show_details'])->name('graphics-cards-details');
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
Route::prefix('keyboard')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\KeyBoardsController::class,'show_list'])->name('keyboard-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\KeyBoardsController::class,'show_details'])->name('keyboard-details');
});
Route::prefix('mouse')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\MousesController::class,'show_list'])->name('mouse-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\MousesController::class,'show_details'])->name('mouse-details');
});
Route::prefix('thermalpastes')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\ThermalPasteController::class,'show_list'])->name('thermalpaste-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\ThermalPasteController::class,'show_details'])->name('thermalpaste-details');
});
Route::prefix('speakers')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\SpeakersController::class,'show_list'])->name('speakers-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\SpeakersController::class,'show_details'])->name('speakers-details');
});
Route::prefix('ups')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\UpsController::class,'show_list'])->name('ups-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\UpsController::class,'show_details'])->name('ups-details');
});
Route::prefix('headphones')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\HeadphonesController::class,'show_list'])->name('headphones-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\HeadphonesController::class,'show_details'])->name('headphones-details');
});
Route::prefix('external-hard-drive')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\ExternalHardDriveController::class,'show_list'])->name('external-hard-drive-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\ExternalHardDriveController::class,'show_details'])->name('external-hard-drive-details');
});
Route::prefix('webcams')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\WebCamController::class,'show_list'])->name('webcams-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\WebCamController::class,'show_details'])->name('webcams-details');
});
Route::prefix('opticaldrives')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\OpticalDriveController::class,'show_list'])->name('optical-drives-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\OpticalDriveController::class,'show_details'])->name('optical-drives-details');
});

Route::prefix('soundcards')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\SoundCardController::class,'show_list'])->name('sound-card-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\SoundCardController::class,'show_details'])->name('sound-card-details');
});
Route::prefix('wireless-network-adapter')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\WirelessNetworkAdapterController::class,'show_list'])->name('wireless-network-adapter-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\WirelessNetworkAdapterController::class,'show_details'])->name('wireless-network-adapter-details');
});
Route::prefix('wired-network-adapter')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\WiredNetworkAdapterController::class,'show_list'])->name('wired-network-adapter-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\WiredNetworkAdapterController::class,'show_details'])->name('wired-network-adapter-details');
});
Route::prefix('casecoolers')->group(function(){
    Route::get('/list',[App\Http\Controllers\api\CaseCoolerController::class,'show_list'])->name('case-cooler-list');
    Route::get('/details/{id}',[App\Http\Controllers\api\CaseCoolerController::class,'show_details'])->name('case-cooler-details');

});
Route::prefix('system-builder')->group(function(){
    Route::get('/add-processor/{processor_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_processor_web'])->name('add-processor-to-system');
    Route::get('/remove-processor',[App\Http\Controllers\api\SystemBuilderController::class,'remove_processor_web'])->name('remove-processor-from-system');
    Route::get('/add-motherboard/{motherboard_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_motherboard_web'])->name('add-motherboard-to-system');
    Route::get('/remove-motherboard',[App\Http\Controllers\api\SystemBuilderController::class,'remove_motherboard_web'])->name('remove-motherboard-from-system');
    Route::get('/add-cooler/{cooler_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_cooler_web'])->name('add-cooler-to-system');
    Route::get('/remove-cooler',[App\Http\Controllers\api\SystemBuilderController::class,'remove_cooler_web'])->name('remove-cooler-from-system');
    Route::get('/add-casing/{casing_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_casing_web'])->name('add-casing-to-system');
    Route::get('/remove-casing',[App\Http\Controllers\api\SystemBuilderController::class,'remove_casing_web'])->name('remove-casing-from-system');
    Route::get('/add-graphic/{graphic_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_graphic_web'])->name('add-graphic-to-system');
    Route::get('/remove-graphic',[App\Http\Controllers\api\SystemBuilderController::class,'remove_graphic_web'])->name('remove-graphic-from-system');
    Route::get('/add-storage/{storage_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_storage_web'])->name('add-storage-to-system');
    Route::get('/remove-storage',[App\Http\Controllers\api\SystemBuilderController::class,'remove_storage_web'])->name('remove-storage-from-system');
    Route::get('/add-memory/{memory_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_memory_web'])->name('add-memory-to-system');
    Route::get('/remove-memory',[App\Http\Controllers\api\SystemBuilderController::class,'remove_memory_web'])->name('remove-memory-from-system');
    Route::get('/add-power_supplier/{power_supplier_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_power_supplier_web'])->name('add-power_supplier-to-system');
    Route::get('/remove-power_supplier',[App\Http\Controllers\api\SystemBuilderController::class,'remove_power_supplier_web'])->name('remove-power_supplier-from-system');
    Route::get('/add-monitor/{monitor_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_monitor_web'])->name('add-monitor-to-system');
    Route::get('/remove-monitor',[App\Http\Controllers\api\SystemBuilderController::class,'remove_monitor_web'])->name('remove-monitor-from-system');
    Route::get('/add-keyboard/{keyboard_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_keyboard_web'])->name('add-keyboard-to-system');
    Route::get('/remove-keyboard',[App\Http\Controllers\api\SystemBuilderController::class,'remove_keyboard_web'])->name('remove-keyboard-from-system');
    Route::get('/add-mouse/{mouse_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_mouse_web'])->name('add-mouse-to-system');
    Route::get('/remove-mouse',[App\Http\Controllers\api\SystemBuilderController::class,'remove_mouse_web'])->name('remove-mouse-from-system');
    Route::get('/add-soundcard/{soundcard_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_soundcard_web'])->name('add-soundcard-to-system');
    Route::get('/remove-soundcard',[App\Http\Controllers\api\SystemBuilderController::class,'remove_soundcard_web'])->name('remove-soundcard-from-system');
    //cooler
    Route::get('/add-cooler/{cooler_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_cooler_web'])->name('add-cooler-to-system');
    Route::get('/remove-cooler',[App\Http\Controllers\api\SystemBuilderController::class,'remove_cooler_web'])->name('remove-cooler-from-system');

    Route::get('/add-case_cooler/{case_cooler_id}',[App\Http\Controllers\api\SystemBuilderController::class,'add_case_cooler_web'])->name('add-case_cooler-to-system');
    Route::get('/remove-case_cooler',[App\Http\Controllers\api\SystemBuilderController::class,'remove_case_cooler_web'])->name('remove-case_cooler-from-system');

    Route::get('/add_system_to_cart',[App\Http\Controllers\api\CartController::class,'add_system_to_cart'])->name('add_system_to_cart');
});

Route::get('/remove-memory',[App\Http\Controllers\api\SystemBuilderController::class,'remove_memory_ajax']);

Route::get('/place-order',[App\Http\Controllers\api\OrderController::class,'place_order'])->middleware('auth')->name('place_order');
Route::post('/place-order',[App\Http\Controllers\api\OrderController::class,'create'])->middleware('auth')->name('create_order');
