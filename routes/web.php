<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index'])->name('book');
