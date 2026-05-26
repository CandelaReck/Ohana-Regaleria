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

    // FORMULARIO CREAR PRODUCTO
    public function create()
    {
    $categorias = Categoria::all();
    return view('backend.admin.productos.nuevoproducto', compact('categorias'));
    }



    // GUARDAR PRODUCTO NUEVO
public function store(Request $request)
{
    $request->validate([
        'nombre'      => 'required|string|max:150',
        'descripcion' => 'nullable|string',
        'precio'      => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'categoria_id'=> 'required|exists:categorias,id',
        'url_imagen'  => 'nullable|string',
        'activo'      => 'boolean',
    ]);

    Producto::create($request->validated());
    return redirect()->route('admin.productos')->with('success', 'Producto creado correctamente.');
}

// FORMULARIO EDITAR
public function edit($id)
{
    $producto   = Producto::findOrFail($id);
    $categorias = Categoria::all();
    return view('backend.admin.productos.editarproducto', compact('producto', 'categorias'));
}

// GUARDAR CAMBIOS
public function update(Request $request, $id)
{
    $producto = Producto::findOrFail($id);

    $request->validate([
        'nombre'      => 'required|string|max:150',
        'descripcion' => 'nullable|string',
        'precio'      => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'categoria_id'=> 'required|exists:categorias,id',
        'url_imagen'  => 'nullable|string',
        'activo'      => 'boolean',
    ]);

    $producto->update($request->validated());
    return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
}

// ELIMINAR
public function destroy($id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();
    return redirect()->route('admin.productos')->with('success', 'Producto eliminado correctamente.');
}

}