<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\CarritoItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    public function index(Request $request){
        $query = Pedido::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc');
                
        if ($request->filled('fecha_desde')) {
            $query->whereDate('created_at', '>=', $request->fecha_desde);
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('created_at', '<=', $request->fecha_hasta);
        }

        $pedidos = $query->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function store(Request $request){
        $request->validate([
            'cliente_nombre'    => 'required|string|max:100',
            'cliente_email'     => 'required|email|max:150',
            'cliente_telefono'  => 'required|string|max:20',
            'cliente_direccion' => 'required|string',
            'metodo_pago'       => 'required|in:efectivo,transferencia,tarjeta_debito,tarjeta_credito,mercado_pago',
        ], [], [
            'cliente_nombre'    => 'nombre completo',
            'cliente_email'     => 'email',
            'cliente_telefono'  => 'teléfono',
            'cliente_direccion' => 'dirección de envío',
            'metodo_pago'       => 'método de pago',
        ]);

        $items = CarritoItem::with('producto')
                 ->where('user_id', auth()->id())
                 ->get();

        if ($items->isEmpty()){
            return redirect()->route('carrito.index')
                   ->with('error', 'Tu carrito está vacío.');
        }

        foreach ($items as $item) {
            if ($item->cantidad > $item->producto->stock) {
                return redirect()->route('carrito.index')
                    ->with('error', "No hay suficiente stock de \"{$item->producto->nombre}\". Stock disponible: {$item->producto->stock} unidades.");
            }
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

            $item->producto->decrement('stock', $item->cantidad);
        }

        CarritoItem::where('user_id', auth()->id())->delete();

        return redirect()->route('pedidos.show', $pedido->id)
            ->with('compra_exitosa', true)
            ->with('success', '¡Pedido realizado con éxito!');
    }

    public function show($id){
        $pedido = Pedido::with('items')
                   ->where('user_id', auth()->id())
                   ->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

    public function cancelar($id){
        $pedido = Pedido::with('items.producto')
                  ->where('user_id', auth()->id())
                  ->findOrFail($id);

        if (in_array($pedido->estado, ['enviado', 'entregado'])) {
            return redirect()->route('pedidos.index')
                    ->with('error', 'No podes cancelar un pedido que ya fue enviado o entregado.');
        }

        // Devolver stock
        foreach ($pedido->items as $item) {
            $item->producto->increment('stock', $item->cantidad);
        }

        $pedido->estado = 'cancelado';
        $pedido->save();

        return redirect()->route('pedidos.index')
                ->with('success', 'Pedido cancelado correctamente.');
    }

    public function factura($id){
        $pedido = Pedido::with('items')
                    ->where('user_id', auth()->id())
                    ->findOrFail($id);

        $logoPath = public_path('img/Logo.jpeg');
        $logoBase64 = base64_encode(file_get_contents($logoPath));
        $logoSrc = 'data:image/jpeg;base64,' . $logoBase64;

        $pdf = Pdf::loadView('pedidos.factura', compact('pedido', 'logoSrc'));

        return $pdf->download('factura-pedido-' . $pedido->id . '.pdf');
    }
}
