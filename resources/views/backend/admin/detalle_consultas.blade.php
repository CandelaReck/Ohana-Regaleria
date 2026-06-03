@extends('layouts.app')

@section('content')
<div class="container py-5 col-md-7">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detalle de consulta</h2>
        <a href="{{ route('admin.consultas') }}" class="btn btn-outline-dark">← Volver</a>
    </div>

    <div class="card shadow rounded-4 p-4 mb-4">
        <p><strong>Nombre:</strong> {{ $consulta->nombre }}</p>
        <p><strong>Email:</strong> {{ $consulta->email }}</p>
        <p><strong>Whatsapp:</strong> {{ $consulta->whatsapp ?? '-' }}</p>
        <p><strong>Fecha:</strong> {{ $consulta->created_at->format('d/m/Y H:i') }}</p>
        <hr>
        <p><strong>Consulta:</strong></p>
        <p>{{ $consulta->consulta }}</p>
    </div>

    {{-- RESPONDER POR EMAIL --}}
    <div class="card shadow rounded-4 p-4">
        <h5 class="mb-3">Responder al cliente</h5>
        <a href="mailto:{{ $consulta->email }}?subject=Respuesta a tu consulta - Ohana Regalería"
           class="btn btn-dark">
            Responder por email
        </a>
        @if($consulta->whatsapp)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consulta->whatsapp) }}"
           target="_blank"
           class="btn btn-success ms-2">
            Responder por WhatsApp
        </a>
        @endif
    </div>

</div>
@endsection