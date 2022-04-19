<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\MovieApiController;

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
Route::get('genres',[GenreApiController::class,'index']);
Route::get('genres/{id}/movies', [GenreApiController::class, 'movies']);
Route::get('movies',[MovieApiController::class,'index']);
Route::get('movies/{id}/genres', [MovieApiController::class, 'genres']);
Route::get('categories',[CategoryApiController::class,'index']);
Route::get('categories/{id}/movies', [CategoryApiController::class, 'movies']);


