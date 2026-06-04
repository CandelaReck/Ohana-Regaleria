@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2>Consulta #{{ $consulta->id }}</h2>

    <div class="card p-4 mb-4">
        <p><strong>Nombre:</strong> {{ $consulta->nombre }}</p>
        <p><strong>Email:</strong> {{ $consulta->email }}</p>
        <p><strong>Whatsapp:</strong> {{ $consulta->whatsapp }}</p>

        <hr>

        <h5>Consulta</h5>
        <p>{{ $consulta->consulta }}</p>
    </div>

    <div class="card p-4">
        <h5>Responder</h5>

        <form action="{{ route('admin.consultas.responder', $consulta->id) }}"
              method="POST">
            @csrf

            <textarea
                name="respuesta"
                class="form-control mb-3"
                rows="6"
                required></textarea>

            <button class="btn btn-success">
                Enviar respuesta
            </button>
        </form>
    </div>

</div>
@endsection