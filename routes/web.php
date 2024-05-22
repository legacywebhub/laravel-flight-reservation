<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserDashboardController;

// Landing page routes
Route::get('/', [LandingController::class, 'home'])->middleware('guest');
Route::get('/about', [LandingController::class, 'about'])->middleware('guest');
Route::get('/contact', [LandingController::class, 'contact'])->middleware('guest');
Route::post('/contact', [LandingController::class, 'saveMessage'])->middleware('guest');
Route::get('/flights', [LandingController::class, 'flights'])->middleware('guest');
Route::post('/flights', [LandingController::class, 'searchFlight'])->middleware('guest');
Route::get('/register', [LandingController::class, 'register'])->middleware('guest');
Route::post('/register', [LandingController::class, 'registerUser'])->middleware('guest');
Route::get('/login', [LandingController::class, 'login'])->middleware('guest');
Route::post('/login', [LandingController::class, 'authenticateUser'])->middleware('guest');
// Auth routes
Route::post('/logout', [UserDashboardController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::get('account/dashboard', [UserDashboardController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('account/flights', [UserDashboardController::class, 'flights'])
    ->middleware('auth')
    ->name('flights');
Route::get('/account/book-flight', [UserDashboardController::class, 'bookFlight'])
    ->middleware('auth')
    ->name('book-flight');
Route::get('/account/checkout/{booking}', [UserDashboardController::class, 'bookFlight'])
    ->middleware('auth')
    ->name('checkout');