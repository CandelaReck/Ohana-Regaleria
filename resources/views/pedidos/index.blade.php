@extends('layouts.app')

@section('title', 'Mis pedidos')

@section('content')
<div class="container">
    <h2 class="mb-4">Mis pedidos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($pedidos->isEmpty())
        <div class="alert alert-info">
            No tenés pedidos todavía.
            <a href="{{ route('productos') }}">Ver productos</a>
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ ucfirst($pedido->estado) }}</td>
                    <td>${{ number_format($pedido->total, 2) }}</td>
                    <td>
                        <a href="{{ route('pedidos.show', $pedido->id) }}" 
                        class="btn btn-sm btn-outline-primary">
                             Ver detalle
                        </a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection