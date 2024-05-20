<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Landing page routes
Route::get('/', [LandingController::class, 'home']);
Route::get('/about', [LandingController::class, 'about']);
Route::get('/contact', [LandingController::class, 'contact']);
