<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/decoHogar', [ProductoController::class, 'decoHogar'])->name('decoHogar');
Route::get('/indumentaria', [ProductoController::class, 'indumentaria'])->name('indumentaria');
Route::get('/combos', [ProductoController::class, 'combos'])->name('combos');
Route::get('/papeleria', [ProductoController::class, 'papeleria'])->name('papeleria');
Route::get('/accesorios', [ProductoController::class, 'accesorios'])->name('accesorios');

Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::get('/quienes-somos', [PaginaController::class, 'quienesSomos'])->name('quienes-somos');
Route::get('/comercializacion', [PaginaController::class, 'comercializacion'])->name('comercializacion');
Route::get('/terminos', [PaginaController::class, 'terminos'])->name('terminos');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar']);
Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registrar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas para cliente
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::put('/carrito/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::delete('/carrito', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
});

// Rutas protegidas para admin
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
});