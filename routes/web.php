<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/magazijn/overzicht', [MagazijnController::class, 'overzicht'])->name('magazijn.overzicht');
Route::get('/magazijn/allergenen/{id}', [MagazijnController::class, 'allergenenInfo'])->name('magazijn.allergenen');
Route::get('/magazijn/levering/{id}', [MagazijnController::class, 'leveringInfo'])->name('magazijn.levering');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
