@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Productos</h2>
        <a href="{{ route('admin.productos.create') }}" class="btn btn-dark">
            + Agregar producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FILTROS --}}
    <div class="card shadow rounded-4 p-4 mb-4">
        <h6 class="mb-3">Filtrar productos</h6>
        <form method="GET" action="{{ route('admin.productos') }}">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Categoría</label>
                    <select name="categoria" class="form-select">
                        <option value="">Todas</option>
                        <option value="Accesorios"   {{ request('categoria') == 'Accesorios'   ? 'selected' : '' }}>Accesorios</option>
                        <option value="Indumentaria" {{ request('categoria') == 'Indumentaria' ? 'selected' : '' }}>Indumentaria</option>
                        <option value="Combos"       {{ request('categoria') == 'Combos'       ? 'selected' : '' }}>Combos</option>
                        <option value="Papeleria"    {{ request('categoria') == 'Papeleria'    ? 'selected' : '' }}>Papelería</option>
                        <option value="Deco Hogar"   {{ request('categoria') == 'Deco Hogar'   ? 'selected' : '' }}>Deco Hogar</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Estado</label>
                    <select name="activo" class="form-select">
                        <option value="">Todos</option>
                        <option value="1" {{ request('activo') === '1' ? 'selected' : '' }}>Activos</option>
                        <option value="0" {{ request('activo') === '0' ? 'selected' : '' }}>Inactivos</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Antigüedad</label>
                    <select name="antiguedad" class="form-select">
                        <option value="">Sin filtro</option>
                        <option value="hoy"      {{ request('antiguedad') == 'hoy'      ? 'selected' : '' }}>Agregados hoy</option>
                        <option value="semana"   {{ request('antiguedad') == 'semana'   ? 'selected' : '' }}>Últimos 7 días</option>
                        <option value="mes"      {{ request('antiguedad') == 'mes'      ? 'selected' : '' }}>Último mes</option>
                        <option value="recientes"{{ request('antiguedad') == 'recientes'? 'selected' : '' }}>Más recientes primero</option>
                    </select>
                </div>

                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-dark w-100">Filtrar</button>
                </div>

            </div>

            @if(request()->hasAny(['categoria', 'activo', 'antiguedad']))
                <div class="mt-2">
                    <a href="{{ route('admin.productos') }}" class="btn btn-outline-secondary btn-sm">
                        Limpiar filtros
                    </a>
                </div>
            @endif

        </form>
    </div>

    {{-- TABLA --}}
    <div class="card shadow rounded-4">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria ?? 'Sin categoría' }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        @if($producto->activo)
                            <span class="badge bg-success">Sí</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.productos.edit', $producto->id) }}"
                           class="btn btn-sm btn-warning">Editar</a>

                        @if($producto->activo)
                            <form action="{{ route('admin.productos.desactivar', $producto->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desactivar este producto?')">
                                    Desactivar
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.productos.activar', $producto->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success">
                                    Activar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay productos cargados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection