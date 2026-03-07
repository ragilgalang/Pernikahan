<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;

// Page Routes
Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/studycase', [PageController::class, 'studycase'])->name('studycase')->middleware('auth');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot-password');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Google Auth
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::post('auth/firebase-login', [AuthController::class, 'firebaseLogin'])->name('auth.firebase-login');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Venues
Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
Route::get('/venues/{id}', [VenueController::class, 'show'])->name('venues.show');

// Flowers
Route::get('/flowers', [FlowerController::class, 'index'])->name('flowers.index');
Route::get('/flowers/{id}', [FlowerController::class, 'show'])->name('flowers.show');

// Bookings & Orders
Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/checkout/pay', [BookingController::class, 'pay'])->name('checkout.pay')->middleware('auth'); // Adjust if method name differs
Route::get('/orders', [BookingController::class, 'orders'])->name('orders')->middleware('auth');

// Profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Feedback
Route::get('/rating', [FeedbackController::class, 'rating'])->name('rating')->middleware('auth');
Route::get('/saran', [FeedbackController::class, 'saran'])->name('saran')->middleware('auth');
Route::post('/saran', [FeedbackController::class, 'storeSaran'])->name('saran.store')->middleware('auth');

// Firebase Testing
Route::get('/test-firebase', [FirebaseController::class, 'index']);
