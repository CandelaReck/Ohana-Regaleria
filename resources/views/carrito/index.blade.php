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
            <a href="#" class="btn btn-success mt-2">Confirmar compra</a>
        </div>
    </div>
    @endif
</div>
@endsection