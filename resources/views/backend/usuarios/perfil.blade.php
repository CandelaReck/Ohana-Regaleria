@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <div class="text-center mb-5">
        <h2>Mi Perfil</h2>
        <p>Actualizá tus datos personales</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="carrito-card">

                <form method="POST" action="{{ route('cliente.perfil.actualizar') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre completo *</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $usuario->name) }}" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $usuario->email) }}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <p class="text-muted small">Dejá en blanco si no querés cambiar la contraseña.</p>

                    <div class="mb-3">
                        <label class="form-label">Nueva contraseña</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">Guardar cambios</button>
                </form>

                <div class="mt-3 text-center">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary">
                        Ver mis pedidos
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>
</section>
@endsection