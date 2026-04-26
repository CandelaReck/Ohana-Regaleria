@extends('layouts.app')
@section('content')
<div class="container py-5">
 <div class="row g-4">
  <div class="col-md-7">
   <div class="card shadow p-4 rounded-4">
    <h3>Datos de envío</h3>
    <input class="form-control mb-3" placeholder="Dirección">
    <input class="form-control mb-3" placeholder="Ciudad">
    <input class="form-control mb-3" placeholder="Teléfono">
   </div>
  </div>
  <div class="col-md-5">
   <div class="card shadow p-4 rounded-4">
    <h3>Resumen</h3>
    <p>Producto x1 - $12.000</p>
    <p>Envío - $2.000</p>
    <hr>
    <h4>Total: $14.000</h4>
    <button class="btn btn-dark w-100">Finalizar compra</button>
   </div>
  </div>
 </div>
</div>
@endsection