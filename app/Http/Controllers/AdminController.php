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

    public function consultas()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('backend.admin.consultas', compact('consultas'));
    }

    public function marcarLeida($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update(['leida' => true]);
        return redirect()->route('admin.consultas')->with('success', 'Consulta marcada como leída.');
    }

    public function ventas()
    {
        $pedidos = Pedido::with('user')->orderBy('created_at', 'desc')->get();
        return view('backend.admin.ventas', compact('pedidos'));
    }
}