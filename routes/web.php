<?php

use App\Http\Controllers\HobiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Route::resource('produk', ProdukController::class);
    // Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    // Route::resource('kategori', KategoriController::class);
    // Route::resource('profile', ProfileController::class);
    // Route::get('/password/edit', [PasswordController::class, 'edit'])->middleware('auth')->name('password.edit');
    // Route::post('/password/update', [PasswordController::class, 'update'])->middleware('auth')->name('password.update1');
    // Route::resource('hobi', HobiController::class);

    // Routes untuk admin (akses semua fitur)
    Route::middleware('can:manage produk')->group(function () {
        Route::resource('produk', ProdukController::class);
    });

    Route::middleware('can:manage kategori')->group(function () {
        Route::resource('kategori', KategoriController::class);
    });

    Route::middleware('can:manage hobi')->group(function () {
        Route::resource('hobi', HobiController::class);
    });

    Route::middleware(['auth', 'can:manage password'])->group(function () {
        Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
        Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update1');
    });

    Route::middleware('can:access profile')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
        Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// Route::get('/kategori', [App\Http\Controllers\kategoriController::class, 'index'])->name('kategori.index');
// Route::get('/kategori/create', [App\Http\Controllers\kategoriController::class, 'create'])->name('kategori.create');
// Route::post('/kategori', [App\Http\Controllers\kategoriController::class, 'store'])->name('kategori.store');
// Route::get('/kategori/edit/{id}', [App\Http\Controllers\kategoriController::class, 'edit'])->name('kategori.edit');
// Route::put('/kategori/{id}', [App\Http\Controllers\kategoriController::class, 'update'])->name('kategori.update');
// Route::delete('/kategori/{id}', [App\Http\Controllers\kategoriController::class, 'destroy'])->name('kategori.destroy');
