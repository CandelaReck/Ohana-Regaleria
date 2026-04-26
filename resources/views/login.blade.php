@extends('layouts.app')

@section('content')

<div class="container py-5 col-md-5">

<div class="card shadow p-4 rounded-4">

<h2 class="text-center mb-4">
Iniciar sesión
</h2>

<form method="POST" action="/login">

@csrf

<input 
type="email"
name="email"
class="form-control mb-3"
placeholder="Correo electrónico">

<input 
type="password"
name="password"
class="form-control mb-3"
placeholder="Contraseña">

<button class="btn btn-dark w-100">
Ingresar
</button>

</form>

<a href="{{ route('registro') }}"
class="btn btn-outline-primary w-100 mt-3">

Si no tiene cuenta, regístrese

</a>

</div>
</div>

@endsection