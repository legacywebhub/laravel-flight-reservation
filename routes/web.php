<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserDashboardController;



// Bot routes
Route::post('/bot', [BotController::class, 'handle'])
    ->name('bot');


// Landing page routes
Route::middleware('guest')->group(function () {
    Route::get('/', [LandingController::class, 'home'])
        ->name('home');
    Route::get('/about', [LandingController::class, 'about'])
        ->name('about');
    Route::get('/services', [LandingController::class, 'services'])
        ->name('services');
    Route::get('/pricing', [LandingController::class, 'pricing'])
        ->name('pricing');
    Route::get('/faq', [LandingController::class, 'faq'])
        ->name('faq');
    Route::get('/contact', [LandingController::class, 'contact'])
        ->name('contact');
    Route::post('/contact', [LandingController::class, 'saveMessage'])
        ->name('contact');
    Route::get('/flights', [LandingController::class, 'flights'])
        ->name('flights');
    Route::post('/flights', [LandingController::class, 'searchFlight'])
        ->name('flights');
    Route::get('flight/{id}', [LandingController::class, 'flight'])  // id here stands for flight id
        ->name('flight');
    Route::get('flight/book/{id}', [LandingController::class, 'bookFlight'])   // id here stands for seat id
        ->name('book_flight');
    Route::post('flight/book/{id}', [LandingController::class, 'checkout'])   // id here stands for seat id
        ->name('checkout');
    Route::get('/booking/invoice/{booking_id}', [LandingController::class, 'invoice'])  // booking_id here here stands for unique generated booking ID
        ->name('invoice');
    Route::get('/register', [LandingController::class, 'register'])
        ->name('register');
    Route::post('/register', [LandingController::class, 'registerUser'])
        ->name('register');
    Route::get('/login', [LandingController::class, 'login'])
        ->name('login');
    Route::post('/login', [LandingController::class, 'authenticateUser'])
        ->name('login');
});


// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/user/logout', [UserDashboardController::class, 'logout'])
        ->name('dashboard.logout');
    Route::get('/user/profile', [UserDashboardController::class, 'profile'])
        ->name('dashboard.profile');
    Route::get('/user/profile/edit', [UserDashboardController::class, 'editProfile'])
        ->name('dashboard.edit_profile');
    Route::get('/user/notifications', [UserDashboardController::class, 'notifications'])
        ->name('dashboard.notifications');
    Route::get('user/dashboard', [UserDashboardController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('user/flights', [UserDashboardController::class, 'flights'])
        ->name('dashboard.flights');
    Route::post('user/flights', [UserDashboardController::class, 'searchFlight'])
        ->name('dashboard.flights');
    Route::get('user/flight/{id}', [UserDashboardController::class, 'flight'])
        ->name('dashboard.flight');
    Route::get('user/bookings', [UserDashboardController::class, 'bookings'])
        ->name('dashboard.bookings');
    Route::get('/user/flight/book/{id}', [UserDashboardController::class, 'bookFlight'])
        ->name('dashboard.book_flight');
    Route::post('/user/flight/book/{id}', [UserDashboardController::class, 'checkout'])
        ->name('dashboard.checkout');
    Route::get('/user/booking/invoice/{booking_id}', [UserDashboardController::class, 'invoice'])
        ->name('dashboard.invoice');
});