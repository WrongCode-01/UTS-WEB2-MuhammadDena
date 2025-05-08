<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AssetController;

// Route default yang dibuat oleh "ui --auth"
Auth::routes();

// Route Home/Dashboard - dilindungi oleh middleware 'auth'
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route Root ("/") - redirect ke /home jika sudah login, jika belum arahkan ke login page
Route::get('/', function () {
    return redirect('/home');
});


// Route Resource untuk Kategori - dilindungi oleh middleware 'auth'
Route::resource('categories', CategoryController::class)->middleware('auth');

// Route Resource untuk Aset - dilindungi oleh middleware 'auth'
Route::resource('assets', AssetController::class)->middleware('auth');
