@extends('layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2>Detalle del Pedido #{{ $pedido->id }}</h2>
        <a href="{{ route('admin.pedidos') }}" class="btn btn-outline-dark">← Volver a pedidos</a>
    </div>

    <div class="row g-4">

        {{-- DATOS DEL PEDIDO --}}
        <div class="col-md-6">
            <div class="card shadow rounded-4 p-4">
                <h5 class="mb-3">Información del pedido</h5>
                <p><strong>Cliente:</strong> {{ $pedido->user->name ?? 'Sin usuario' }}</p>
                <p><strong>Email:</strong> {{ $pedido->user->email ?? '-' }}</p>
                <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Método de pago:</strong> {{ ucfirst(str_replace('_', ' ', $pedido->metodo_pago)) }}</p>
                <p><strong>Estado:</strong>
                    <span class="badge-estado estado-{{ $pedido->estado }}">
                        {{ ucfirst(str_replace('_', ' ', $pedido->estado)) }}
                    </span>
                </p>
                <p><strong>Total:</strong> ${{ number_format($pedido->total, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- CAMBIAR ESTADO --}}
        <div class="col-md-6">
            <div class="card shadow rounded-4 p-4">
                <h5 class="mb-3">Cambiar estado</h5>
                <form method="POST" action="{{ route('admin.pedidos.estado', $pedido->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-2">
                        <select name="estado" class="form-select">
                            <option value="pendiente"      {{ $pedido->estado == 'pendiente'      ? 'selected' : '' }}>Pendiente</option>
                            <option value="confirmado"     {{ $pedido->estado == 'confirmado'     ? 'selected' : '' }}>Confirmado</option>
                            <option value="en_preparacion" {{ $pedido->estado == 'en_preparacion' ? 'selected' : '' }}>En preparación</option>
                            <option value="enviado"        {{ $pedido->estado == 'enviado'        ? 'selected' : '' }}>Enviado</option>
                            <option value="entregado"      {{ $pedido->estado == 'entregado'      ? 'selected' : '' }}>Entregado</option>
                            <option value="cancelado"      {{ $pedido->estado == 'cancelado'      ? 'selected' : '' }}>Cancelado</option>
                        </select>
                        <button type="submit" class="btn btn-dark">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- PRODUCTOS DEL PEDIDO --}}
    <div class="card shadow rounded-4 p-4 mt-4">
        <h5 class="mb-3">Productos del pedido</h5>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedido->items as $item)
                <tr>
                    <td>{{ $item->producto_nombre }}</td>
                    <td>${{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>${{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No hay items en este pedido.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>${{ number_format($pedido->total, 0, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
</section>
@endsection