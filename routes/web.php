<?php

use App\Http\Controllers\KosController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\PembayaranController;

Route::resource('kos', KosController::class);
Route::resource('penyewa', PenyewaController::class);
Route::resource('pembayaran', PembayaranController::class);

Route::group(['middleware' => [\App\Http\Middleware\AdminMiddleware::class]], function () {
    // Route admin di sini
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk user biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

// Route untuk admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Tambahkan route admin lainnya di sini
});
