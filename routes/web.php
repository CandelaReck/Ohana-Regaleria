<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Inicio']);
})->name('home');

Route::get('/comercializacion', function () {
    return view('comercializacion');
})->name('comercializacion');

Route::get('/quienes-somos', function () {
    return view('quienes-somos');
})->name('quienes-somos');

Route::get('/productos', function () {
    return view('productos');
})->name('productos');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');