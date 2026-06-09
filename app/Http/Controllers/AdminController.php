<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Consulta;
use App\Models\User;
use App\Models\Pedido;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsuarios  = User::count();
        $totalProductos = Producto::count();
        $totalPedidos   = Pedido::count();
        $totalConsultas = Consulta::where('leida', false)->count();

        return view('backend.admin.menu_adm', compact(
            'totalUsuarios',
            'totalProductos',
            'totalPedidos',
            'totalConsultas'
        ));
    }

    public function usuarios()
    {
        $usuarios = User::orderBy('created_at', 'desc')->get();
        return view('backend.admin.usuarios', compact('usuarios'));
    }

    public function consultas(Request $request)
{
    $query = Consulta::orderBy('created_at', 'desc');

    // Filtro por email
    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    // Filtro por estado (respondida o no)
    if ($request->filled('respondida')) {
        $query->where('respondida', $request->respondida);
    }

    // Filtro leído/No leído
    if ($request->filled('leida')) {
    $query->where('leida', $request->leida);
    }

    // Filtro desde una fecha
    if ($request->filled('fecha_desde')) {
        $query->whereDate('created_at', '>=', $request->fecha_desde);
    }

    // Filtro hasta una fecha
    if ($request->filled('fecha_hasta')) {
        $query->whereDate('created_at', '<=', $request->fecha_hasta);
    }

    $consultas = $query->get();

    return view('backend.admin.consultas', compact('consultas'));
}


    public function verConsulta($id)
    {
    $consulta = Consulta::findOrFail($id);
    $consulta->update(['leida' => true]);
    return view('backend.admin.consulta_detalle', compact('consulta'));
    }

    public function pedidos(Request $request)
{
    $query = Pedido::with('user')->orderBy('created_at', 'desc');

    // Filtro por estado
    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    // Filtro por cliente (nombre)
    if ($request->filled('cliente')) {
        $query->whereHas('user', fn($q) => $q->where('name', 'like', '%' . $request->cliente . '%'));
    }

    // Filtro por fecha desde
    if ($request->filled('fecha_desde')) {
        $query->whereDate('created_at', '>=', $request->fecha_desde);
    }

    // Filtro por fecha hasta
    if ($request->filled('fecha_hasta')) {
        $query->whereDate('created_at', '<=', $request->fecha_hasta);
    }

    // Filtro por método de pago
    if ($request->filled('metodo_pago')) {
        $query->where('metodo_pago', $request->metodo_pago);
    }

    $pedidos = $query->get();
    return view('backend.admin.pedidos.index', compact('pedidos'));
}

public function verPedido($id)
{
    $pedido = Pedido::with(['user', 'items'])->findOrFail($id);
    return view('backend.admin.pedidos.detalle', compact('pedido'));
}

public function actualizarEstadoPedido(Request $request, $id)
{
    $pedido = Pedido::findOrFail($id);
    $pedido->update(['estado' => $request->estado]);
    return redirect()->route('admin.pedidos')->with('success', 'Estado actualizado correctamente.');
}

public function responderConsulta(Request $request, $id)
{
    $consulta = Consulta::findOrFail($id);

    // guardar respuesta
    $consulta->respuesta = $request->respuesta;
    $consulta->respondida = true;
    $consulta->save();

    return redirect()
        ->route('admin.consultas')
        ->with('success', 'Respuesta enviada correctamente');
} 

public function marcarLeida($id)
{
    $consulta = Consulta::findOrFail($id);

    $consulta->update([
        'leida' => true
    ]);

    return back();
}

public function marcarNoLeida($id)
{
    $consulta = Consulta::findOrFail($id);

    $consulta->update([
        'leida' => false
    ]);

    return back();
}
}