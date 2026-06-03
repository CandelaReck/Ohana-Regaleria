<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\CarritoItem;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function store(Request $request){
        $request->validate([
            'cliente_nombre'    => 'required|string|max:100',
            'cliente_email'     => 'nullable|email|max:150',
            'cliente_telefono'  => 'nullable|string|max:20',
            'cliente_direccion' => 'nullable|string',
            'metodo_pago'       => 'required|in:efectivo, transferencia, tarjeta_debito, tarjeta_credito, mercado_pago',

        ]);

        $items = CarritoItem::with('producto')
                 ->where('user_id', auth()->id())
                 ->get();

        if ($items->isEmpty()){
            return redirect()->route('carrito.index')
                   ->with('error', 'Tu carrito está vacío.');
        }

        $subtotal = $items->sum(fn($item) => $item->precio_unitario * $item->cantidad);

        $pedido = Pedido::create([
            'user_id'           => auth()->id(),
            'cliente_nombre'    => $request->cliente_nombre,
            'cliente_email'     => $request->cliente_email,
            'cliente_telefono'  => $request->cliente_telefono,
            'cliente_direccion' => $request->cliente_direccion,
            'metodo_pago'       => $request->metodo_pago,
            'subtotal'          => $subtotal,
            'total'             => $subtotal,
        ]);

        foreach ($items as $item) {
          $pedido->items()->create([
            'producto_id'     => $item->producto_id,
            'producto_nombre' => $item->producto->nombre,
            'precio_unitario' => $item->precio_unitario,
            'cantidad'        => $item->cantidad,
            'subtotal'        => $item->precio_unitario * $item->cantidad,
            ]);

        // ← Actualizar stock
            $item->producto->decrement('stock', $item->cantidad);
        }

        CarritoItem::where('user_id', auth()->id())->delete();

        return redirect()->route('pedidos.show', $pedido->id)
                 ->with('success', '¡Pedido realizado con éxito!');
    }

    public function show($id){
        $pedido = Pedido::with('items')
                   ->where('user_id', auth()->id())
                   ->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

    public function cancelar($id){
        $pedido = Pedido::where('user_id', auth()->id())
                  ->findOrFail($id);

        if (in_array($pedido->estado, ['enviado', 'entregado'])) {
            return redirect()->route('pedidos.index')
                    ->with('error', 'No podes cancelar un pedido que ya fue enviado o entregado.');
        }

        $pedido->estado = 'cancelado';
        $pedido->save();

        return redirect()->route('pedidos.index')
                ->with('success', 'Pedido cancelado correctamente.');
    }


}
