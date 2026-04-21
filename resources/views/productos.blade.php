@extends('layouts.app')

@section('content')

<section class="shop-page py-5">

<div class="container">

<!-- TITULO -->
<div class="text-center mb-5">
<h1 class="shop-title">Productos</h1>
<p class="shop-subtitle">
Regalos únicos pensados para sorprender
</p>
</div>

<!-- FILTRO SIMPLE -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

<p class="m-0 text-muted">
Mostrando 6 productos
</p>

<select class="form-select w-auto">
<option>Ordenar por</option>
<option>Menor precio</option>
<option>Mayor precio</option>
<option>Más vendidos</option>
</select>

</div>

<!-- PRODUCTOS -->
<div class="row g-4">

<!-- PRODUCTO -->
<div class="col-sm-6 col-lg-4">

<div class="producto-box">

<div class="producto-img-box">
<img src="{{ asset('img/pijamaPrint.jpeg') }}" class="producto-img">
</div>

<div class="producto-info">

<h5>Indumentaria</h5>

<p class="producto-desc">
Ropa pensada para impresionar.
</p>

<p class="precio">$18.500</p>

<a href="#" class="btn btn-dark w-100">
Comprar
</a>

</div>
</div>
</div>


<!-- PRODUCTO -->
<div class="col-sm-6 col-lg-4">

<div class="producto-box">

<div class="producto-img-box">
<img src="{{ asset('img/aritos.jpeg') }}" class="producto-img">
</div>

<div class="producto-info">

<h5>Aritos Boutique</h5>

<p class="producto-desc">
Detalles delicados y elegantes.
</p>

<p class="precio">$7.900</p>

<a href="#" class="btn btn-dark w-100">
Comprar
</a>

</div>
</div>
</div>


<!-- PRODUCTO -->
<div class="col-sm-6 col-lg-4">

<div class="producto-box">

<div class="producto-img-box">
<img src="{{ asset('img/peluche3.jpeg') }}" class="producto-img">
</div>

<div class="producto-info">

<h5>Peluche Teddy</h5>

<p class="producto-desc">
El clásico regalo que enamora.
</p>

<p class="precio">$12.500</p>

<a href="#" class="btn btn-dark w-100">
Comprar
</a>

</div>
</div>
</div>

</div>
</div>
</section>

@endsection