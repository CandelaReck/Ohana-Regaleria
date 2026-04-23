<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PaginaController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos');

Route::get('/contacto', [PaginaController::class, 'contacto'])
    ->name('contacto');

Route::get('/quienes-somos', [PaginaController::class, 'quienesSomos'])
    ->name('quienes-somos');

Route::get('/comercializacion', [PaginaController::class, 'comercializacion'])
    ->name('comercializacion');

Route::get('/terminos', [PaginaController::class, 'terminos'])
    ->name('terminos');    

