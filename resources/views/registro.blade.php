@extends('layouts.app')

@section('content')

<div class="container py-5 col-md-5">

<div class="card shadow p-4 rounded-4">

<h2 class="text-center mb-4">
Crear cuenta
</h2>

<form method="POST" action="/registro">

@csrf

<input name="nombre"
class="form-control mb-3"
placeholder="Nombre">

<input name="email"
class="form-control mb-3"
placeholder="Correo">

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Contraseña">

<button class="btn btn-primary w-100">
Registrarme
</button>

</form>

</div>
</div>

@endsection