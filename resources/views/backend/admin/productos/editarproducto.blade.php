@extends('layouts.app')

@section('content')
<div class="container py-5 col-md-6">
<div class="card shadow p-4 rounded-4">

    <h2 class="mb-4">Editar Producto</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.productos.update', $producto->id) }}"
          enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <label class="form-label">Nombre</label>
        <input name="nombre" type="text"
            class="form-control mb-3"
            value="{{ old('nombre', $producto->nombre) }}">

        <label class="form-label">Descripción</label>
<textarea name="descripcion"
    class="form-control mb-3"
    rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>

        <label class="form-label">Precio</label>
        <input name="precio" type="number" step="0.01"
            class="form-control mb-3"
            value="{{ old('precio', $producto->precio) }}">

        <label class="form-label">Stock</label>
        <input name="stock" type="number" min="0"
            class="form-control mb-3"
            value="{{ old('stock', $producto->stock) }}">

        <label class="form-label">Categoría</label>
        <select name="categoria" class="form-select mb-3">
            <option value="">Seleccioná una categoría</option>
            <option value="Accesorios"   {{ old('categoria', $producto->categoria ?? '') == 'Accesorios'   ? 'selected' : '' }}>Accesorios</option>
            <option value="Indumentaria" {{ old('categoria', $producto->categoria ?? '') == 'Indumentaria' ? 'selected' : '' }}>Indumentaria</option>
            <option value="Combos"       {{ old('categoria', $producto->categoria ?? '') == 'Combos'       ? 'selected' : '' }}>Combos</option>
            <option value="Papeleria"    {{ old('categoria', $producto->categoria ?? '') == 'Papeleria'    ? 'selected' : '' }}>Papelería</option>
            <option value="Deco Hogar"   {{ old('categoria', $producto->categoria ?? '') == 'Deco Hogar'   ? 'selected' : '' }}>Deco Hogar</option>
        </select>

        <label class="form-label">Imagen</label>

        {{-- Mostrar imagen actual --}}
        @if($producto->url_imagen)
            <div class="mb-2">
                <img src="{{ $producto->url_imagen }}"
                     alt="Imagen actual"
                     style="height: 100px; object-fit: cover; border-radius: 8px;">
                <p class="text-muted small mt-1">Imagen actual</p>
            </div>
        @endif

        {{-- Subir nueva imagen --}}
        <input name="imagen" type="file"
            class="form-control mb-2"
            accept="image/*">

        {{-- O pegar URL --}}
        <input name="url_imagen" type="text"
            class="form-control mb-3"
            placeholder="O pegá una URL de imagen"
            value="{{ old('url_imagen', $producto->url_imagen) }}">

        <label class="form-label">Activo</label>
        <select name="activo" class="form-select mb-4">
            <option value="1" {{ old('activo', $producto->activo) == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('activo', $producto->activo) == 0 ? 'selected' : '' }}>No</option>
        </select>

        <button class="btn btn-dark w-100">Guardar cambios</button>

        <a href="{{ route('admin.productos') }}"
           class="btn btn-outline-secondary w-100 mt-2">Cancelar</a>

    </form>
</div>
</div>
@endsection