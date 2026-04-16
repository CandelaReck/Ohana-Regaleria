@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Comercialización</h1>

    <p>
        Ofrecemos distintas opciones de compra, envío y pago para 
        facilitar la experiencia del cliente.
    </p>

    <h2>Tipos de Entrega</h2>
    <div style="display: flex;
    align-items: center; gap: 20px;
    margin-bottom: 30px;">
    <img src="{{ asset('img/imagenEntrega.png') }}"
    alt="Entrega"
    style="width:250px;
    border-radius:10px;">

    <ul>
        <li>Envíos a domicilio</li>
        <li>Retiro en punto de entrega</li>
    </ul>
</div>
    <h2>Formas de Envío</h2>
    <div style="display: flex;
    align-items: center; gap: 20px;
    margin-bottom: 30px;">
    <img src="{{ asset('img/imagenEnvio.png') }}"
    alt="Envio"
    style="width:250px;
    border-radius:10px;">
    <ul>
        <li>Correo</li>
        <li>Mensajería privada</li>
        <li>Entrega coordinada con el cliente</li>
    </ul>
</div>
    <h2>Formas de Pago</h2>
    <div style="display: flex;
    align-items: center; gap: 20px;
    margin-bottom: 30px;">
    <img src="{{ asset('img/imagenPago.png') }}"
    alt="Pago"
    style="width:250px;
    border-radius:10px;">
    <ul>
        <li>Efectivo</li>
        <li>Transferencia bancaria</li>
        <li>Mercado Pago</li>
    </ul>
 </div>

</div>
@endsection
