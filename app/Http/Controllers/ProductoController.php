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
    $productos = Producto::where('activo', true)->get();
    return view('productos', compact('productos'));
}

// ACCESORIOS
public function accesorios()
{
    $productos = Producto::where('categoria', 'Accesorios')
                    ->where('activo', true)
                    ->get();
    return view('accesorios', compact('productos'));
}

// INDUMENTARIA
public function indumentaria()
{
    $productos = Producto::where('categoria', 'Indumentaria')
                    ->where('activo', true)
                    ->get();
    return view('indumentaria', compact('productos'));
}

// COMBOS
public function combos()
{
    $productos = Producto::where('categoria', 'Combos')
                    ->where('activo', true)
                    ->get();
    return view('combos', compact('productos'));
}

// PAPELERIA
public function papeleria()
{
    $productos = Producto::where('categoria', 'Papeleria')
                    ->where('activo', true)
                    ->get();
    return view('papeleria', compact('productos'));
}

// DECO Y HOGAR
public function decoHogar()
{
    $productos = Producto::where('categoria', 'Deco Hogar')
                    ->where('activo', true)
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
public function adminIndex(Request $request)
{
    $query = Producto::orderBy('created_at', 'desc');

    // Filtro por categoría
    if ($request->filled('categoria')) {
        $query->where('categoria', $request->categoria);
    }

    // Filtro por estado activo/inactivo
    if ($request->filled('activo')) {
        $query->where('activo', $request->activo);
    }

    // Filtro por antigüedad
    if ($request->filled('antiguedad')) {
        match($request->antiguedad) {
            'hoy'      => $query->whereDate('created_at', today()),
            'semana'   => $query->where('created_at', '>=', now()->subDays(7)),
            'mes'      => $query->where('created_at', '>=', now()->subDays(30)),
            'recientes'=> $query->orderBy('created_at', 'desc'),
            default    => null
        };
    }

    $productos = $query->get();
    return view('backend.admin.productos.indexproductos', compact('productos'));
}


    // GUARDAR PRODUCTO NUEVO
public function store(Request $request)
{
    $validated = $request->validate([
        'nombre'      => 'required|string|max:150',
        'descripcion' => 'nullable|string',
        'precio'      => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'categoria'   => 'required|string|max:50',
        'url_imagen'  => 'nullable|string',
        'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'activo'      => 'nullable|boolean',
    ]);

    $activo = $request->has('activo') ? (bool) $request->activo : false;

    // Manejar imagen
    $urlImagen = null;
    if ($request->hasFile('imagen')) {
        $path = $request->file('imagen')->store('productos', 'public');
        $urlImagen = asset('storage/' . $path);
    } elseif ($request->filled('url_imagen')) {
        $urlImagen = $request->url_imagen;
    }

    $producto = new Producto();
    $producto->nombre      = $validated['nombre'];
    $producto->descripcion = $validated['descripcion'] ?? null;
    $producto->precio      = $validated['precio'];
    $producto->stock       = $validated['stock'];
    $producto->categoria   = $validated['categoria'];
    $producto->url_imagen  = $urlImagen;
    $producto->activo      = $activo;
    $producto->save();

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
        'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'activo'      => 'nullable|boolean',
    ]);

    $validated['activo'] = $request->has('activo') ? (bool) $request->activo : false;

    // Si se subió una imagen nueva, guardarla
    if ($request->hasFile('imagen')) {
        $path = $request->file('imagen')->store('productos', 'public');
        $producto->url_imagen = asset('storage/' . $path);
    } elseif ($request->filled('url_imagen')) {
        $producto->url_imagen = $validated['url_imagen'];
    }

    $producto->categoria   = $validated['categoria'];
    $producto->nombre      = $validated['nombre'];
    $producto->descripcion = $validated['descripcion'];
    $producto->precio      = $validated['precio'];
    $producto->stock       = $validated['stock'];
    $producto->activo      = $validated['activo'];
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

public function activar($id)
{
    $producto = Producto::findOrFail($id);
    $producto->update(['activo' => true]);
    return redirect()->route('admin.productos')->with('success', 'Producto activado correctamente.');
}

}