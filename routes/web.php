<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use Illuminate\View\View;

Route::get('/', function (): View {
    return view('welcome');
});

Route::resource('score', ScoreController::class); 