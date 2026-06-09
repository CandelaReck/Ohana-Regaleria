@extends('layouts.app')

@section('title', 'Detalle del pedido')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <h2 class="mb-4">Pedido #{{ $pedido->id }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-md-6">
            <div class="carrito-card">
                <h5 class="mb-3">Datos de envío</h5>
                <p><strong>Nombre:</strong> {{ $pedido->cliente_nombre }}</p>
                <p><strong>Email:</strong> {{ $pedido->cliente_email ?? '-' }}</p>
                <p><strong>Teléfono:</strong> {{ $pedido->cliente_telefono ?? '-' }}</p>
                <p><strong>Dirección:</strong> {{ $pedido->cliente_direccion ?? '-' }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="carrito-card">
                <h5 class="mb-3">Estado del pedido</h5>
                <p><strong>Estado:</strong> {{ ucfirst($pedido->estado) }}</p>
                <p><strong>Método de pago:</strong> {{ ucfirst(str_replace('_', ' ', $pedido->metodo_pago)) }}</p>
                <p><strong>Estado pago:</strong> {{ ucfirst($pedido->estado_pago) }}</p>
                <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="carrito-card mt-4">
        <h5 class="mb-3">Productos</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido->items as $item)
                <tr>
                    <td>{{ $item->producto_nombre }}</td>
                    <td>${{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>${{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>${{ number_format($pedido->total, 0, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-4 d-flex gap-3">
    <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary">
        Volver a mis pedidos
    </a>
    <a href="{{ route('pedidos.factura', $pedido->id) }}" class="btn btn-outline-secondary">
    Descargar factura
</a>

    @if(!in_array($pedido->estado, ['enviado', 'entregado', 'cancelado']))
    <form method="POST" action="{{ route('pedidos.cancelar', $pedido->id) }}">
        @csrf
        @method('PATCH')
        <button class="btn btn-outline-danger"
                onclick="return confirm('¿Seguro que querés cancelar este pedido?')">
            Cancelar pedido
        </button>
    </form>
    @endif
    </div>

</div>
</section>
@endsection