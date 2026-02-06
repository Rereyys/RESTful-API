<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\LoginController;

Route::post('/register', RegisterController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/score', [ScoreController::class, 'index']);
Route::apiResource('score', ScoreController::class);