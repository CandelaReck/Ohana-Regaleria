@extends('layouts.app')

@section('title', 'Gestionar Pedidos')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <div class="text-center mb-5">
        <h2>Gestionar Pedidos</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($pedidos->isEmpty())
        <div class="alert alert-info text-center">No hay pedidos todavía.</div>
    @else
        <div class="carrito-card">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Método de pago</th>
                        <th>Estado</th>
                        <th>Cambiar estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->cliente_nombre }}</td>
                        <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                        <td>${{ number_format($pedido->total, 0, ',', '.') }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $pedido->metodo_pago)) }}</td>
                        <td>
                            <span class="badge-estado estado-{{ $pedido->estado }}">
                                {{ ucfirst(str_replace('_', ' ', $pedido->estado)) }}
                            </span>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.pedidos.estado', $pedido->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="d-flex gap-2">
                                    <select name="estado" class="form-select form-select-sm">
                                        <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="confirmado" {{ $pedido->estado == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                                        <option value="en_preparacion" {{ $pedido->estado == 'en_preparacion' ? 'selected' : '' }}>En preparación</option>
                                        <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>