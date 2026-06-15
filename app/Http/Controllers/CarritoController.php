<?php

namespace App\Http\Controllers;

use App\Models\CarritoItem;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $items = CarritoItem::with('producto')
                ->where('user_id', auth()->id())
                ->get();
            $total = $items->sum(fn($item) => $item->precio_unitario * $item->cantidad);
        } else {
            $items = collect(session()->get('carrito', []));
            $total = $items->sum(fn($item) => $item['precio_unitario'] * $item['cantidad']);
        }

        return view('carrito.index', compact('items', 'total'));
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id'     => 'required|exists:productos,id',
            'cantidad'        => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
        ]);

        $producto = \App\Models\Producto::findOrFail($request->producto_id);
        
        if ($producto->stock <= 0) {
            if ($request->ajax()) {
                return response()->json(['ok' => false, 'mensaje' => 'Este producto no tiene stock disponible.']);
                }
            return redirect()->back()->with('error', 'Este producto no tiene stock disponible.');
        }

        if (auth()->check()) {
            // Usuario logueado → base de datos (igual que antes)
            $item = CarritoItem::where('user_id', auth()->id())
                ->where('producto_id', $request->producto_id)
                ->first();

            if ($item) {
                $item->cantidad += $request->cantidad;
                $item->save();
            } else {
                CarritoItem::create([
                    'user_id'         => auth()->id(),
                    'producto_id'     => $request->producto_id,
                    'cantidad'        => $request->cantidad,
                    'precio_unitario' => $request->precio_unitario,
                ]);
            }
        } else {
            // Guest → sesión
            $carrito = session()->get('carrito', []);
            $pid = $request->producto_id;

            if (isset($carrito[$pid])) {
                $carrito[$pid]['cantidad'] += $request->cantidad;
            } else {
                $carrito[$pid] = [
                    'producto_id'     => $pid,
                    'nombre'          => $request->nombre,
                    'cantidad'        => $request->cantidad,
                    'precio_unitario' => $request->precio_unitario,
                ];
            }

            session()->put('carrito', $carrito);
        }

        if ($request->ajax()) {
            return response()->json(['ok' => true]);
        }
        
        return redirect()->back();
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate(['cantidad' => 'required|integer|min:1']);

        if (auth()->check()) {
            $item = CarritoItem::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            $item->cantidad = $request->cantidad;
            $item->save();
        } else {
            $carrito = session()->get('carrito', []);
            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad'] = $request->cantidad;
                session()->put('carrito', $carrito);
            }
        }

        return redirect()->route('carrito.index');
    }

    public function eliminar($id)
    {
        if (auth()->check()) {
            CarritoItem::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail()
                ->delete();
        } else {
            $carrito = session()->get('carrito', []);
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index');
    }

    public function vaciar()
    {
        if (auth()->check()) {
            CarritoItem::where('user_id', auth()->id())->delete();
        } else {
            session()->forget('carrito');
        }

        return redirect()->route('carrito.index');
    }

    // Llamar esto desde el LoginController después de autenticar
    public function fusionarSesionConDB()
    {
        $carrito = session()->get('carrito', []);

        foreach ($carrito as $pid => $data) {
            $item = CarritoItem::where('user_id', auth()->id())
                ->where('producto_id', $pid)
                ->first();

            if ($item) {
                $item->cantidad += $data['cantidad'];
                $item->save();
            } else {
                CarritoItem::create([
                    'user_id'         => auth()->id(),
                    'producto_id'     => $pid,
                    'cantidad'        => $data['cantidad'],
                    'precio_unitario' => $data['precio_unitario'],
                ]);
            }
        }

        session()->forget('carrito');
    }

    public function mini(){
    if (auth()->check()) {
        $items = CarritoItem::with('producto')
            ->where('user_id', auth()->id())
            ->get();
        $total = $items->sum(fn($item) => $item->precio_unitario * $item->cantidad);
    } else {
        $items = collect(session()->get('carrito', []));
        $total = $items->sum(fn($item) => $item['precio_unitario'] * $item['cantidad']);
    }

    return view('carrito.mini', compact('items', 'total'));
    }
}
