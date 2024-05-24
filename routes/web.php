<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserDashboardController;

// Landing page routes
Route::get('/', [LandingController::class, 'home'])
    ->middleware('guest')
    ->name('home');
Route::get('/about', [LandingController::class, 'about'])
    ->middleware('guest')
    ->name('about');
Route::get('/contact', [LandingController::class, 'contact'])
    ->middleware('guest')
    ->name('contact');
Route::post('/contact', [LandingController::class, 'saveMessage'])
    ->middleware('guest')
    ->name('contact');
Route::get('/flights', [LandingController::class, 'flights'])
    ->middleware('guest')
    ->name('flights');
Route::post('/flights', [LandingController::class, 'searchFlight'])
    ->middleware('guest')
    ->name('flights');
Route::get('/register', [LandingController::class, 'register'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [LandingController::class, 'registerUser'])
    ->middleware('guest')
    ->name('register');
Route::get('/login', [LandingController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LandingController::class, 'authenticateUser'])
    ->middleware('guest')
    ->name('login');


// Auth routes
Route::post('/user/logout', [UserDashboardController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::get('/user/profile', [UserDashboardController::class, 'profile'])
    ->middleware('auth')
    ->name('user-profile');
Route::get('/user/profile/edit', [UserDashboardController::class, 'editProfile'])
    ->middleware('auth')
    ->name('edit-profile');
Route::get('/user/notifications', [UserDashboardController::class, 'notifications'])
    ->middleware('auth')
    ->name('user-notifications');
Route::get('user/dashboard', [UserDashboardController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('user/flights', [UserDashboardController::class, 'flights'])
    ->middleware('auth')
    ->name('user-flights');
Route::post('user/flights', [UserDashboardController::class, 'searchFight'])
    ->middleware('auth')
    ->name('search-flight');
Route::get('user/flight/{flight}', [UserDashboardController::class, 'flight'])
    ->middleware('auth')
    ->name('flight');
Route::get('user/bookings', [UserDashboardController::class, 'bookings'])
    ->middleware('auth')
    ->name('user-bookings');
Route::get('/user/book/{flight}', [UserDashboardController::class, 'book'])
    ->middleware('auth')
    ->name('book');
Route::post('/user/book/{flight}', [UserDashboardController::class, 'bookFlight'])
    ->middleware('auth')
    ->name('book-flight');
Route::get('/user/checkout/{booking}', [UserDashboardController::class, 'checkout'])
    ->middleware('auth')
    ->name('checkout');