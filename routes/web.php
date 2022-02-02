<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/bookmark', [BookmarkController::class, 'show']);
Route::post('/bookmark/store', [BookmarkController::class, 'store']);

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);

Route::post('/review/store', [ReviewController::class, 'store']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/store', [CartController::class, 'store']);

require __DIR__.'/auth.php';
