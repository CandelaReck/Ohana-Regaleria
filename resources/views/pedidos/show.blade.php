@extends('layouts.app')

@section('title', 'Detalle del pedido')

@section('content')
<div class="container">
    <h2 class="mb-4">Pedido #{{ $pedido->id }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Datos de envío</div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $pedido->cliente_nombre }}</p>
                    <p><strong>Email:</strong> {{ $pedido->cliente_email ?? '-' }}</p>
                    <p><strong>Teléfono:</strong> {{ $pedido->cliente_telefono ?? '-' }}</p>
                    <p><strong>Dirección:</strong> {{ $pedido->cliente_direccion ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Estado del pedido</div>
                <div class="card-body">
                    <p><strong>Estado:</strong> {{ ucfirst($pedido->estado) }}</p>
                    <p><strong>Método de pago:</strong> {{ ucfirst(str_replace('_', ' ', $pedido->metodo_pago)) }}</p>
                    <p><strong>Estado pago:</strong> {{ ucfirst($pedido->estado_pago) }}</p>
                    <p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>