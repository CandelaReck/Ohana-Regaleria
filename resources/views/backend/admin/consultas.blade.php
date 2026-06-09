@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Consultas recibidas</h2>
        <a href="{{ route('admin') }}" class="btn btn-outline-dark">← Volver al panel</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FILTROS --}}
    <div class="card shadow rounded-4 p-4 mb-4">
        <h6 class="mb-3">Filtrar consultas</h6>
        <form method="GET" action="{{ route('admin.consultas') }}">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Por email</label>
                    <input type="email" name="email"
                        class="form-control"
                        placeholder="ejemplo@email.com"
                        value="{{ request('email') }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Estado</label>
                    <select name="respondida" class="form-select">
                        <option value="">Todos</option>
                        <option value="1" {{ request('respondida') === '1' ? 'selected' : '' }}>Respondidas</option>
                        <option value="0" {{ request('respondida') === '0' ? 'selected' : '' }}>Sin responder</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Leída</label>
                    <select name="leida" class="form-select">
                        <option value="">Todas</option>
                        <option value="1" {{ request('leida') === '1' ? 'selected' : '' }}>Leídas</option>
                        <option value="0" {{ request('leida') === '0' ? 'selected' : '' }}>Sin leer</option>
                    </select>
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

                <div class="col-md-1 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-dark w-100">
                        Filtrar
                    </button>
                </div>

            </div>

            {{-- Botón limpiar filtros --}}
            @if(request()->hasAny(['email', 'respondida', 'fecha', 'fecha_desde', 'fecha_hasta']))
                <div class="mt-2">
                    <a href="{{ route('admin.consultas') }}" class="btn btn-outline-secondary btn-sm">
                        Limpiar filtros
                    </a>
                </div>
            @endif

        </form>
    </div>

    {{-- TABLA --}}
    <div class="card shadow rounded-4">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Whatsapp</th>
                    <th>Consulta</th>
                    <th>Respuesta</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Cambiar Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultas as $consulta)
                <tr class="{{ !$consulta->leida && !$consulta->respuesta ? 'table-warning' : '' }}">
                    <td>{{ $consulta->id }}</td>
                    <td>{{ $consulta->nombre }}</td>
                    <td>{{ $consulta->email }}</td>
                    <td>{{ $consulta->whatsapp ?? '-' }}</td>
                    <td>{{ Str::limit($consulta->consulta, 50) }}</td>
                    <td>{{ $consulta->respuesta ? Str::limit($consulta->respuesta, 50) : '-' }}</td>
                    <td>{{ $consulta->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if($consulta->respuesta)
                            <span class="badge bg-primary">Respondida</span>
                        @elseif($consulta->leida)
                            <span class="badge bg-success">Leída</span>
                        @else
                            <span class="badge bg-warning text-dark">Sin leer</span>
                        @endif
                    </td>
                    <td>
                        @if($consulta->leida)
                            <form action="{{ route('admin.consultas.marcarNoLeida', $consulta->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-warning">Marcar sin leer</button>
                            </form>
                        @else
                            <form action="{{ route('admin.consultas.leida', $consulta->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-success">Marcar leída</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.consultas.ver', $consulta->id) }}" class="btn btn-sm btn-dark">Ver</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No hay consultas recibidas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection