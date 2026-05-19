@extends('layouts.app')

@section('content')

<div class="container py-5 col-md-5">
<div class="card shadow p-4 rounded-4">

<h2 class="text-center mb-4">Crear cuenta</h2>

<form method="POST" action="{{ route('registro') }}">
@csrf

<input name="name"
    type="text"
    class="form-control mb-3"
    placeholder="Nombre">

<input name="apellido"
    type="text"
    class="form-control mb-3"
    placeholder="Apellido">

<input name="email"
    type="email"
    class="form-control mb-3"
    placeholder="Correo electrónico">

<input name="password"
    type="password"
    class="form-control mb-3"
    placeholder="Contraseña">

<input name="password_confirmation"
    type="password"
    class="form-control mb-3"
    placeholder="Repetir contraseña">

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
@endif

<button class="btn btn-primary w-100">
    Registrarme
</button>

</form>
</div>
</div>

@endsection