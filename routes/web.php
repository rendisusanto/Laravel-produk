<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

// Halaman utama langsung ke daftar produk
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Daftar produk (optional jika ingin akses lewat /products juga)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Form tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Simpan data produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Form edit produk
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update produk
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
