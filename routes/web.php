<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::resource('book', BookController::class);
Route::get('/', [BookController::class, 'index']);
Route::get('/export-excel', [BookController::class, 'exportExcel'])->name('export.excel');
Route::get('/export-pdf', [BookController::class, 'exportPDF'])->name('export.pdf');
