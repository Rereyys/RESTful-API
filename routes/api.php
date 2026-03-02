<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Middleware\EnsureTokenValid;
use App\Http\Controllers\Api\LogoutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(middleware: 'auth:sanctum');

// Route::group([
//     'middleware' => 'api',                                                                                                                                       
//     'prefix'=> 'auth'
// ], function ($router){});

//Route::get('/score', [ScoreController::class, 'index']);

Route::apiResource('/score', ScoreController::class)->middleware(middleware: 'jwt');
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);
// Route::get('')