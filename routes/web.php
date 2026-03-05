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

Route::get('/profile/edit', function () {
    return view('edit-profile');
})->name('profile.edit')->middleware('auth');

Route::post('/profile/edit', function (\Illuminate\Http\Request $request) {
    // Di sini nantinya Anda bisa menambahkan logika validasi & penyimpanan ke database.
    // Contoh untuk sementara: 
    return redirect()->route('dashboard')->with('success', 'Profil dan Password berhasil diperbarui!');
})->name('profile.update')->middleware('auth');

Route::get('/rating', function () {
    return view('rating');
})->name('rating')->middleware('auth');

Route::get('/saran', function () {
    return view('saran');
})->name('saran')->middleware('auth');

Route::post('/saran', function (\Illuminate\Http\Request $request) {
    // Di sini nantinya Anda bisa menyimpan data saran ke database
    return redirect()->route('dashboard')->with('success', 'Terima kasih! Saran Anda telah kami terima.');
})->name('saran.store')->middleware('auth');

Route::get('/studycase', function () {
    $venues = \App\Models\Venue::paginate(10);
    return view('studycase', compact('venues'));
})->name('studycase')->middleware('auth');

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('dashboard');
})->name('logout');
