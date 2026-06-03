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

    // VISTA ADMIN - LISTA DE PRODUCTOS
    public function adminIndex()
    {   
    $productos = Producto::with('categoria')->get();
    return view('backend.admin.productos.indexproductos', compact('productos'));
    }


    // GUARDAR PRODUCTO NUEVO
public function store(Request $request)
{
    $validated = $request->validate([
        'nombre'       => 'required|string|max:150',
        'descripcion'  => 'nullable|string',
        'precio'       => 'required|numeric|min:0',
        'stock'        => 'required|integer|min:0',
        'categoria' => 'required|in:Accesorios,Indumentaria,Combos,Papeleria,Deco Hogar',
        'url_imagen'   => 'nullable|string',
        'activo'       => 'nullable|boolean',
    ]);

    $validated['activo'] = $request->has('activo') ? (bool) $request->activo : false;

    Producto::create($validated);
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

    $validated = $request->validate([
        'nombre'      => 'required|string|max:150',
        'descripcion' => 'nullable|string',
        'precio'      => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'categoria'   => 'required|string|max:50',
        'url_imagen'  => 'nullable|string',
        'activo'      => 'nullable|boolean',
    ]);

    $validated['activo'] = $request->has('activo') ? (bool) $request->activo : false;

    $producto->categoria    = $validated['categoria'];
    $producto->nombre       = $validated['nombre'];
    $producto->descripcion  = $validated['descripcion'];
    $producto->precio       = $validated['precio'];
    $producto->stock        = $validated['stock'];
    $producto->url_imagen   = $validated['url_imagen'];
    $producto->activo       = $validated['activo'];
    $producto->save();

    return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
}





// BAJA LÓGICA
public function desactivar($id)
{
    $producto = Producto::findOrFail($id);
    $producto->update(['activo' => false]);
    return redirect()->route('admin.productos')->with('success', 'Producto desactivado correctamente.');
}

}