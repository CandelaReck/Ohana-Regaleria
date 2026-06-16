<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoAdminController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('user')->orderBy('created_at', 'desc')->get();
        return view('backend.admin.pedidos.index', compact('pedidos'));
    }

    public function cambiarEstado(Request $request, $id)
    {
    $request->validate([
        'estado' => 'required|in:pendiente,confirmado,en_preparacion,enviado,entregado,cancelado',
    ]);

    $pedido = Pedido::with('items.producto')->findOrFail($id);

    // Si se está cancelando, devolver stock
    if ($request->estado === 'cancelado' && $pedido->estado !== 'cancelado') {
        foreach ($pedido->items as $item) {
            $item->producto->increment('stock', $item->cantidad);
        }
    }

    $pedido->estado = $request->estado;
    $pedido->save();

    return redirect()->route('admin.pedidos')
            ->with('success', 'Estado actualizado correctamente.');
    }
}
