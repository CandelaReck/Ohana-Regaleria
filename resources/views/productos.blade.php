@extends('layouts.app')

@section('content')

<section class="py-5">

<div class="container">

<h1 class="text-center mb-2">Nuestros Productos</h1>
<p class="text-center text-muted mb-5">
Regalos únicos pensados para sorprender
</p>

<div class="row g-4">

@foreach($productos as $producto)

<div class="col-md-6 col-lg-4">

<div class="card h-100 shadow border-0">

<img src="{{ asset('img/' . $producto['imagen']) }}"
class="card-img-top producto-foto">

<div class="card-body text-center d-flex flex-column">

<h5>{{ $producto['nombre'] }}</h5>

<p class="text-muted">
{{ $producto['descripcion'] }}
</p>

<h4 class="text-success mb-3">
${{ number_format($producto['precio'],0,',','.') }}
</h4>

<a href="#" class="btn btn-dark mt-auto">
Comprar
</a>

</div>
</div>
</div>

@endforeach

</div>
</div>
</section>

@endsection