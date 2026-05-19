<?php

namespace App\Http\Controllers;

use App\Models\CarritoItem;

use Illuminate\Http\Request;

class CarritoController extends Controller{
    public function index(){
        $items = CarritoItem::with('producto')
                  ->where('user_id', auth()->id())
                  ->get();
        $total = $items->sum(function($item) {
            return $item->precio_unitario * $item->cantidad;
        });

        return view('carrito.index', compact('items', 'total'));
    }

    public function agregar(Request $request){
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad'    => 'required|integer|min:1',
        ]);

        $item = CarritoItem::where('user_id', auth()->id())
                  ->where('producto_id', $request->producto_id)
                  ->first();

        if($item) {
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

        return redirect()->route('carrito.index');
    }

    public function actualizar(Request $request, $id){
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $item = CarritoItem::where('id', $id)
                  ->where('user_id', auth()->id())
                  ->firstOrFail();

        $item->cantidad = $request->cantidad;
        $item->save();

        return redirect()->route('carrito.index');
    }

    public function eliminar($id){
        $item = CarritoItem::where('id', $id)
                  ->where('user_id', auth()->id())
                  ->firstOrFail();

        $item->delete();

        return redirect()->route('carrito.index');
    }

    public function vaciar(){
        CarritoItem::where('user_id', auth()->id())->delete();

        return redirect()->route('carrito.index');
    }
}
