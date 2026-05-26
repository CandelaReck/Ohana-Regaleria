<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    // VISTA GENERAL - TODOS LOS PRODUCTOS
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos', compact('productos'));
    }

    // ACCESORIOS
    public function accesorios()
    {
        $productos = Producto::with('categoria')
            ->whereHas('categoria', fn($q) => $q->where('nombre', 'Accesorios'))
            ->get();
        return view('accesorios', compact('productos'));
    }

    // INDUMENTARIA
    public function indumentaria()
    {
        $productos = Producto::with('categoria')
            ->whereHas('categoria', fn($q) => $q->where('nombre', 'Indumentaria'))
            ->get();
        return view('indumentaria', compact('productos'));
    }

    // COMBOS
    public function combos()
    {
        $productos = Producto::with('categoria')
            ->whereHas('categoria', fn($q) => $q->where('nombre', 'Combos'))
            ->get();
        return view('combos', compact('productos'));
    }

    // PAPELERIA
    public function papeleria()
    {
        $productos = Producto::with('categoria')
            ->whereHas('categoria', fn($q) => $q->where('nombre', 'Papeleria'))
            ->get();
        return view('papeleria', compact('productos'));
    }

    // DECO Y HOGAR
    public function decoHogar()
    {
        $productos = Producto::with('categoria')
            ->whereHas('categoria', fn($q) => $q->where('nombre', 'Deco Hogar'))
            ->get();
        return view('decoHogar', compact('productos'));
    }

    // FORMULARIO CREAR PRODUCTO (solo admin)
    public function create()
    {
        $categorias = Categoria::all();
        return view('backend.admin.productos.create', compact('categorias'));
    }
}