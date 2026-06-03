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
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Admin\PedidoAdminController;

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

// Rutas del carrito (públicas pero requieren auth solo al confirmar)
 Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::put('/carrito/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::delete('/carrito', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

//Solo confirmar compra requiere auth
Route::post('/pedidos', [PedidoController::class, 'store'])
  ->middleware(['auth', 'rol:cliente'])
  ->name('pedidos.store');

// Rutas protegidas para cliente
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::get('/cliente/perfil', [ClienteController::class, 'perfil'])->name('cliente.perfil');
    Route::put('/cliente/perfil', [ClienteController::class, 'actualizarPerfil'])->name('cliente.perfil.actualizar');
    Route::patch('/pedidos/{id}/cancelar', [PedidoController::class, 'cancelar'])->name('pedidos.cancelar');
});

// Rutas protegidas para admin
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/admin/consultas', [AdminController::class, 'consultas'])->name('admin.consultas');
    Route::post('/admin/consultas/{id}/leida', [AdminController::class, 'marcarLeida'])->name('admin.consultas.leida');
    Route::get('/admin/consultas/{id}', [AdminController::class, 'verConsulta'])->name('admin.consultas.ver');
    Route::get('/admin/pedidos', [PedidoAdminController::class, 'index'])->name('admin.pedidos');
    Route::put('/admin/pedidos/{id}', [PedidoAdminController::class, 'cambiarEstado'])->name('admin.pedidos.estado');

    Route::get('/admin/productos', [ProductoController::class, 'adminIndex'])->name('admin.productos');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/admin/productos/{id}/editar', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::patch('/admin/productos/{id}/desactivar', [ProductoController::class, 'desactivar'])->name('admin.productos.desactivar');
    
});