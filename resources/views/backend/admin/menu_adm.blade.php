@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Panel de Administración</h1>
        <span class="badge bg-dark fs-6">{{ Auth::user()->name }}</span>
    </div>

    {{-- TARJETAS DE RESUMEN --}}
    <div class="row g-4 mb-5">

        <div class="col-md-3">
            <div class="card shadow text-center p-4 rounded-4">
                <h2>{{ $totalUsuarios }}</h2>
                <p class="mb-0">Usuarios registrados</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center p-4 rounded-4">
                <h2>{{ $totalProductos }}</h2>
                <p class="mb-0">Productos</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center p-4 rounded-4">
                <h2>{{ $totalPedidos }}</h2>
                <p class="mb-0">Ventas realizadas</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center p-4 rounded-4">
                <h2>{{ $totalConsultas }}</h2>
                <p class="mb-0">Consultas sin leer</p>
            </div>
        </div>

    </div>

    {{-- ACCESOS RAPIDOS --}}
    <div class="card shadow p-4 rounded-4">

        <h5 class="mb-4">Accesos rápidos</h5>

        <div class="row g-3">

            <div class="col-md-4">
                <a href="{{ route('admin.productos') }}"
                   class="btn btn-dark w-100">
                    Gestionar productos
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.usuarios') }}"
                   class="btn btn-dark w-100">
                    Ver usuarios
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.consultas') }}"
                   class="btn btn-dark w-100">
                    Ver consultas
                    @if($totalConsultas > 0)
                        <span class="badge bg-danger ms-1">{{ $totalConsultas }}</span>
                    @endif
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.pedidos') }}"
                   class="btn btn-dark w-100">
                    Ver pedidos y ventas
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('home') }}"
                   class="btn btn-outline-dark w-100">
                    Ir al inicio
                </a>
            </div>

            <div class="col-md-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        Cerrar sesión
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>

@endsection