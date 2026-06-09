@extends('layouts.app')

@section('title', 'Gestionar Pedidos')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2>Gestionar Pedidos</h2>
        <a href="{{ route('admin') }}" class="btn btn-outline-dark">← Volver al panel</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- FILTROS --}}
    <div class="card shadow rounded-4 p-4 mb-4">
        <h6 class="mb-3">Filtrar pedidos</h6>
        <form method="GET" action="{{ route('admin.pedidos') }}">
            <div class="row g-3">

                <div class="col-md-2">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="">Todos</option>
                        <option value="pendiente"      {{ request('estado') == 'pendiente'      ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmado"     {{ request('estado') == 'confirmado'     ? 'selected' : '' }}>Confirmado</option>
                        <option value="en_preparacion" {{ request('estado') == 'en_preparacion' ? 'selected' : '' }}>En preparación</option>
                        <option value="enviado"        {{ request('estado') == 'enviado'        ? 'selected' : '' }}>Enviado</option>
                        <option value="entregado"      {{ request('estado') == 'entregado'      ? 'selected' : '' }}>Entregado</option>
                        <option value="cancelado"      {{ request('estado') == 'cancelado'      ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Método de pago</label>
                    <select name="metodo_pago" class="form-select">
                        <option value="">Todos</option>
                        <option value="efectivo"        {{ request('metodo_pago') == 'efectivo'        ? 'selected' : '' }}>Efectivo</option>
                        <option value="transferencia"   {{ request('metodo_pago') == 'transferencia'   ? 'selected' : '' }}>Transferencia</option>
                        <option value="tarjeta_debito"  {{ request('metodo_pago') == 'tarjeta_debito'  ? 'selected' : '' }}>Tarjeta débito</option>
                        <option value="tarjeta_credito" {{ request('metodo_pago') == 'tarjeta_credito' ? 'selected' : '' }}>Tarjeta crédito</option>
                        <option value="mercado_pago"    {{ request('metodo_pago') == 'mercado_pago'    ? 'selected' : '' }}>Mercado Pago</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Cliente</label>
                    <input type="text" name="cliente"
                        class="form-control"
                        placeholder="Nombre del cliente"
                        value="{{ request('cliente') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Desde</label>
                    <input type="date" name="fecha_desde"
                        class="form-control"
                        value="{{ request('fecha_desde') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Hasta</label>
                    <input type="date" name="fecha_hasta"
                        class="form-control"
                        value="{{ request('fecha_hasta') }}">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-dark w-100">Filtrar</button>
                </div>

            </div>

            @if(request()->hasAny(['estado', 'metodo_pago', 'cliente', 'fecha_desde', 'fecha_hasta']))
                <div class="mt-2">
                    <a href="{{ route('admin.pedidos') }}" class="btn btn-outline-secondary btn-sm">
                        Limpiar filtros
                    </a>
                </div>
            @endif

        </form>
    </div>

    {{-- TABLA --}}
    @if($pedidos->isEmpty())
        <div class="alert alert-info text-center">No hay pedidos que coincidan con los filtros.</div>
    @else
        <div class="card shadow rounded-4">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Método de pago</th>
                        <th>Estado</th>
                        <th>Cambiar estado</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->user->name ?? 'Sin usuario' }}</td>
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
                                        <option value="pendiente"      {{ $pedido->estado == 'pendiente'      ? 'selected' : '' }}>Pendiente</option>
                                        <option value="confirmado"     {{ $pedido->estado == 'confirmado'     ? 'selected' : '' }}>Confirmado</option>
                                        <option value="en_preparacion" {{ $pedido->estado == 'en_preparacion' ? 'selected' : '' }}>En preparación</option>
                                        <option value="enviado"        {{ $pedido->estado == 'enviado'        ? 'selected' : '' }}>Enviado</option>
                                        <option value="entregado"      {{ $pedido->estado == 'entregado'      ? 'selected' : '' }}>Entregado</option>
                                        <option value="cancelado"      {{ $pedido->estado == 'cancelado'      ? 'selected' : '' }}>Cancelado</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-dark">
                                        Actualizar
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.pedidos.ver', $pedido->id) }}"
                               class="btn btn-sm btn-dark">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
</section>
@endsection