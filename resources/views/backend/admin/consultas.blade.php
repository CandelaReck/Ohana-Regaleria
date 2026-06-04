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

    <td>
        {{ $consulta->respuesta ? Str::limit($consulta->respuesta, 50) : '-' }}
    </td>

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

<form action="{{ route('admin.consultas.marcarNoLeida', $consulta->id) }}"
      method="POST">
    @csrf
    <button class="btn btn-sm btn-outline-warning">
        Marcar sin leer
    </button>
</form>

@else

<form action="{{ route('admin.consultas.leida', $consulta->id) }}"
      method="POST">
    @csrf
    <button class="btn btn-sm btn-outline-success">
        Marcar leída
    </button>
</form>

@endif

</td>

    <td>
        <a href="{{ route('admin.consultas.ver', $consulta->id) }}"
           class="btn btn-sm btn-dark">
            Ver
        </a>
    </td>

</tr>
@empty
<tr>
    <td colspan="10" class="text-center">
        No hay consultas recibidas.
    </td>
</tr>
@endforelse
</tbody>
        </table>
    </div>

</div>
@endsection