<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Models\produk;
use App\Models\kategori;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('produk', ProdukController::class);
Route::resource('kategori', KategoriController::class);

// Route::get('/kategori', [App\Http\Controllers\kategoriController::class, 'index'])->name('kategori.index');
// Route::get('/kategori/create', [App\Http\Controllers\kategoriController::class, 'create'])->name('kategori.create');
// Route::post('/kategori', [App\Http\Controllers\kategoriController::class, 'store'])->name('kategori.store');
// Route::get('/kategori/edit/{id}', [App\Http\Controllers\kategoriController::class, 'edit'])->name('kategori.edit');
// Route::put('/kategori/{id}', [App\Http\Controllers\kategoriController::class, 'update'])->name('kategori.update');
// Route::delete('/kategori/{id}', [App\Http\Controllers\kategoriController::class, 'destroy'])->name('kategori.destroy');
