<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destacados = DB::table('pedido_items')
            ->join('pedidos', 'pedido_items.pedido_id', '=', 'pedidos.id')
            ->join('productos', 'pedido_items.producto_id', '=', 'productos.id')
            ->where('pedidos.estado', 'entregado')
            ->selectRaw('productos.id, productos.nombre, productos.precio, productos.url_imagen, SUM(pedido_items.cantidad) as unidades')
            ->groupBy('productos.id', 'productos.nombre', 'productos.precio', 'productos.url_imagen')
            ->orderByDesc('unidades')
            ->limit(3)
            ->get();

        if ($destacados->count() < 3) {
            $idsYaIncluidos = $destacados->pluck('id')->toArray();

            $relleno = Producto::whereNotIn('id', $idsYaIncluidos)
                ->where('activo', true)
                ->limit(3 - $destacados->count())
                ->get(['id', 'nombre', 'precio', 'url_imagen']);

            $destacados = $destacados->concat($relleno);
        }

        return view('home', compact('destacados'));
    }
}