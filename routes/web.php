<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/magazijn/overzicht', function () {
    return view('magazijn.overzicht');
})->name('magazijn.overzicht');
