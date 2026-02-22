<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/berita/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/kategori/{category:slug}', [PostController::class, 'category'])->name('categories.show');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/kirim-tulisan', [SubmissionController::class, 'create'])->name('submissions.create');
Route::post('/kirim-tulisan', [SubmissionController::class, 'store'])->name('submissions.store');