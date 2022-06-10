<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TestimonialController;
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

Route::resources([
    'pages' => PageController::class,
    'banners' => BannerController::class,
    'images' => ImageController::class,
    'galeria' => GalleryController::class,
    'noticias' => NewsController::class,
    'depoimentos' => TestimonialController::class,
    'categories' => CategoriesController::class,
    'message' => MessageController::class
]);

Route::post('/banners/upload', [BannerController::class, 'upload']);
Route::post('/noticias/upload', [NewsController::class, 'upload']);
Route::post('/depoimentos/upload', [TestimonialController::class, 'upload']);
