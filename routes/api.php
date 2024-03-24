<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\SpecialiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->group(function () {
    Route::resource('auteurs', AuteurController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('specialites', SpecialiteController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('editeurs', EditeurController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('livres', LivreController::class);
});
