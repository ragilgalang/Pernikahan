<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\FlowerController;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class , 'index'])->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    // Untuk demo, kita ambil user pertama
    $user = \App\Models\User::first();
    if ($user) {
        \Illuminate\Support\Facades\Auth::login($user);
    }

    // Prioritaskan parameter redirect_to jika ada
    if ($request->filled('redirect_to')) {
        return redirect($request->redirect_to);
    }

    // Jika tidak ada parameter, gunakan intended() atau default ke dashboard
    return redirect()->intended(route('dashboard'));
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::post('/register', function () {
    // For now, redirect to dashboard on post
    return redirect()->route('dashboard');
});

Route::get('/venues', [VenueController::class , 'index'])->name('venues.index');
Route::get('/venues/{id}', [VenueController::class , 'show'])->name('venues.show');

Route::get('/flowers', [FlowerController::class , 'index'])->name('flowers.index');
Route::get('/flowers/{id}', [FlowerController::class , 'show'])->name('flowers.show');

Route::get('/checkout', [\App\Http\Controllers\BookingController::class , 'checkout'])->name('checkout')->middleware('auth');
Route::post('/checkout/pay', function () {
    return redirect()->route('dashboard')->with('success', 'Pembayaran Berhasil!');
})->name('checkout.pay')->middleware('auth');

Route::get('/orders', [\App\Http\Controllers\BookingController::class , 'orders'])->name('orders')->middleware('auth');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/reviews/{type}/{id}', [\App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

Route::get('/suggestions', [\App\Http\Controllers\SuggestionController::class, 'create'])->name('suggestions.create');
Route::post('/suggestions', [\App\Http\Controllers\SuggestionController::class, 'store'])->name('suggestions.store');

Route::get('/studycase', [\App\Http\Controllers\StudyCaseController::class, 'index'])->name('studycase.index');

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('dashboard');
})->name('logout');
Route::get('/api/test', function () {
    return response()->json([
        'message' => 'API berhasil dari Laravel'
    ]);
});