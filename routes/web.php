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
Route::get('flight/{id}', [LandingController::class, 'flight'])
    ->middleware('guest')
    ->name('flight');
Route::get('flight/book/{id}', [LandingController::class, 'bookFlight']) // id here stands for seat id
    ->middleware('guest')
    ->name('book_flight');
Route::post('flight/book/{id}', [LandingController::class, 'saveBooking']) // id here stands for seat id
    ->middleware('guest')
    ->name('book_flight');
Route::get('/booking/checkout/{booking_id}', [LandingController::class, 'checkout'])
    ->middleware('guest')  # booking_id here here stands for unique generated booking ID
    ->name('checkout');
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
    ->name('dashboard.logout');
Route::get('/user/profile', [UserDashboardController::class, 'profile'])
    ->middleware('auth')
    ->name('dashboard.profile');
Route::get('/user/profile/edit', [UserDashboardController::class, 'editProfile'])
    ->middleware('auth')
    ->name('dashboard.edit_profile');
Route::get('/user/notifications', [UserDashboardController::class, 'notifications'])
    ->middleware('auth')
    ->name('dashboard.notifications');
Route::get('user/dashboard', [UserDashboardController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('user/flights', [UserDashboardController::class, 'flights'])
    ->middleware('auth')
    ->name('dashboard.flights');
Route::post('user/flights', [UserDashboardController::class, 'searchFight'])
    ->middleware('auth')
    ->name('dashboard.search_flight');
Route::get('user/flight/{flight}', [UserDashboardController::class, 'flight'])
    ->middleware('auth')
    ->name('dashboard.flight');
Route::get('user/bookings', [UserDashboardController::class, 'bookings'])
    ->middleware('auth')
    ->name('dashboard.bookings');
Route::get('/user/flight/book/{id}', [UserDashboardController::class, 'bookFlight'])
    ->middleware('auth')
    ->name('dashboard.book_flight');
Route::post('/user/flight/book/{id}', [UserDashboardController::class, 'saveBooking'])
    ->middleware('auth')
    ->name('dashboard.book_flight');
Route::get('/user/booking/checkout/{booking_id}', [UserDashboardController::class, 'checkout'])
    ->middleware('auth')
    ->name('dashboard.checkout');