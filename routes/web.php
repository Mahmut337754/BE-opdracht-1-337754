<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/magazijn/overzicht', [MagazijnController::class, 'overzicht'])->name('magazijn.overzicht');
Route::get('/magazijn/allergenen/{id}', [MagazijnController::class, 'allergenenInfo'])->name('magazijn.allergenen');
Route::get('/magazijn/levering/{id}', [MagazijnController::class, 'leveringInfo'])->name('magazijn.levering');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
