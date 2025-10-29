<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/magazijn/overzicht', [MagazijnController::class, 'overzicht'])
    ->name('magazijn.overzicht');

Route::get('/magazijn/{id}/levering', [MagazijnController::class, 'leveringInfo'])
    ->name('magazijn.levering');

Route::get('/magazijn/{id}/allergenen', [MagazijnController::class, 'allergenenInfo'])
    ->name('magazijn.allergenen');
