<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->prefix('administrador')->group( function () {

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

Route::resource('message', MessageController::class);

Route::get('/{pagina}', function ($pagina) {
    return view("pages.$pagina")->with('page', $pagina);
});

