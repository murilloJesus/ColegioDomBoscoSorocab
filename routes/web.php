<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

 //Clear route cache
 Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
});

// Clear cache using reoptimized class
Route::get('/optimize-clear', function() {
    Artisan::call('optimize:clear');
    return 'Cache optimized';
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::middleware(['auth:sanctum', 'verified'])->prefix('administrador')->group( function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/', function ()
    {
        return view('admin.home')->with('page', 'home');
    });

    Route::get('/{pagina}', function ($pagina) {
        return view("admin.$pagina")->with('page', $pagina);
    });
});


Route::prefix('noticias')->group(function(){

    Route::get('/', [NewsController::class, 'home']);

    Route::get('/{name}/{id}', [NewsController::class, 'ver']);

});

Route::get('/', [PagesController::class, 'index']);

Route::resource('message', MessageController::class)->only('store');

Route::get('/{pagina}', function ($pagina) {
    return view("pages.$pagina")->with('page', $pagina);
});

