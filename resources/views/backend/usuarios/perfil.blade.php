@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<section class="py-5" style="background: var(--crema);">
<div class="container">

    <div class="text-center mb-5">
        <h2>Mi Perfil</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">

            {{-- VISTA DE DATOS --}}
            <div class="carrito-card" id="vista-datos">
                <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                <p><strong>Email:</strong> {{ $usuario->email }}</p>
                <p class="mb-0"><strong>Contraseña:</strong> ••••••••</p>
                <div class="mt-4">
                    <button class="btn btn-primary" onclick="mostrarFormulario()">
                        Editar perfil
                    </button>
                </div>
            </div>

            {{-- FORMULARIO DE EDICION --}}
            <div class="carrito-card" id="formulario-edicion" style="display:none;">
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

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary">Guardar cambios</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="ocultarFormulario()">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
</section>

<script>
function mostrarFormulario() {
    document.getElementById('vista-datos').style.display = 'none';
    document.getElementById('formulario-edicion').style.display = 'block';
}
function ocultarFormulario() {
    document.getElementById('formulario-edicion').style.display = 'none';
    document.getElementById('vista-datos').style.display = 'block';
}

// Si hay errores de validación, mostrar el formulario directamente
@if($errors->any())
    mostrarFormulario();
@endif
</script>

@endsection