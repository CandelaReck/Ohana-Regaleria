@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow p-5 rounded-4">

        <h1 class="mb-3">Panel de Administración</h1>

        <p class="mb-4">
            Bienvenido, {{ Auth::user()->name }}
        </p>

        <div class="d-grid gap-3">

            <a href="{{ route('admin.productos') }}"
               class="btn btn-dark">
                Gestionar productos
            </a>
            <a href="{{ route('admin.pedidos') }}"
               class="btn btn-dark">
               Gestionar pedidos 
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                        class="btn btn-outline-danger w-100">
                    Cerrar sesión
                </button>
            </form>

        </div>

    </div>

</div>

@endsection