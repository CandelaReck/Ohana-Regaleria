<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactoController;


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

Route::get('/decoHogar', [ProductoController::class, 'decoHogar'])
    ->name('decoHogar');

Route::get('/indumentaria', [ProductoController::class, 'indumentaria'])
    ->name('indumentaria'); 

Route::get('/combos', [ProductoController::class, 'combos'])
    ->name('combos');

Route::get('/papeleria', [ProductoController::class, 'papeleria'])
    ->name('papeleria');

Route::get('/accesorios', [ProductoController::class, 'accesorios'])
    ->name('accesorios');

Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/registro', [AuthController::class, 'mostrarRegistro'])->name('registro');

Route::post('/registro', [AuthController::class, 'registrar']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])
    ->name('contacto.enviar');
