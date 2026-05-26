@extends('layouts.app')

@section('title', 'Mi carrito')

@section('content')
<div class="container">
    <h2 class="mb-4">Mi carrito</h2>

    @if($items->isEmpty())
       <div class="alert alert-info">
          Tu carrito está vacío.
          <a href="{{ route('productos') }}">Ver productos</a>
       </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->producto->nombre }}</td>
                <td>${{ number_format($item->precio_unitario, 2)}}</td>
                <td>
                    <form method="POST" action="{{ route('carrito.actualizar', $item->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="number" name="cantidad"
                               value="{{ $item->cantidad }}"
                               min="1" class="form-control" style="width: 80px">
                        <button class="btn btn-sm btn-outline-secondary mt-1">
                            Actualizar
                        </button>
                    </form>
                </td>
                <td>${{ number_format($item->precio_unitario * $item->cantidad, 2)}}</td>
                <td>
                    <form method="POST" action="{{route('carrito.eliminar', $item->id) }}">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            Eliminar 
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between align-items-center mt-4">
        <form method="POST" action ="{{ route('carrito.vaciar')}}">
           @csrf 
           @method('DELETE')
           <button class="btn btn-outline-danger">Vaciar carrito</button>
        </form>

        <div class="text-end">
            <h4>Total: ${{ number_format($total, 2)}}</h4>
            <form method="POST" action="{{ route('pedidos.store')}}">
                @csrf 
                <div class="mb-3">
                    <label class="form-label">Nombre completo *</label>
                    <input type="text" name="cliente_nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="cliente_email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input type="text" name="cliente_telefono" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección de envío</label>
                    <textarea name="cliente_direccion" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Método de pago *</label>
                    <select name="metodo_pago" class="form-select" required>
                        <option value="">Seleccioná uno</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="transferencia">Transferencia</option>
                        <option value="tarjeta_debito">Tarjeta de Debito</option>
                        <option value="tarjeta_credito">Tarjeta de Credito</option>
                        <option value="mercado_pago">Mercado Pago</option>
                    </select>
                </div>
                <button class="btn btn-success w-100">Confirmar compra</button>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection