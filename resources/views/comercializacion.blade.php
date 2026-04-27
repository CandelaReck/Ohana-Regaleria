@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Titulo -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Comercialización</h1>
        <p class="text-muted">
            Ofrecemos distintas opciones de compra, envío y pago para 
            facilitar la experiencia del cliente.
        </p>
    </div>

    <!-- Tipos de Entrega -->
    <h2>Tipos de Entrega</h2>
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 40px;">
        <img src="{{ asset('img/imagenEntrega.png') }}"
            alt="Entrega"
            style="width:250px; border-radius:10px;">

        <ul>
            <li>Envíos a domicilio</li>
            <li>Retiro en punto de entrega</li>
        </ul>
    </div>

    <!-- Formas de Envío -->
    <h2>Formas de Envío</h2>
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 40px;">
        <img src="{{ asset('img/imagenEnvio.png') }}"
            alt="Envio"
            style="width:250px; border-radius:10px;">

        <ul>
            <li>Correo</li>
            <li>Mensajería privada</li>
            <li>Entrega coordinada con el cliente</li>
        </ul>
    </div>

    <!-- Formas de Pago -->
    <h2>Formas de Pago</h2>
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 50px;">
        <img src="{{ asset('img/imagenPago.png') }}"
            alt="Pago"
            style="width:250px; border-radius:10px;">

        <ul>
            <li>Efectivo</li>
            <li>Transferencia bancaria</li>
            <li>Mercado Pago</li>
        </ul>
    </div>

    <!-- Como comprar -->
<h2 class="text-center mt-5 mb-4">¿Cómo comprar?</h2>

<div class="row text-center mb-5">

    <div class="col-md-4 mb-3">
        <div class="border rounded p-4 h-100 shadow-sm">
            <div style="font-size:40px; font-weight:bold; color:#198754;">1</div>
            <h5 class="mt-2">Agregá al carrito</h5>
            <p class="text-muted">
                Seleccioná los productos que desees y agregalos al carrito de compras.
            </p>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="border rounded p-4 h-100 shadow-sm">
            <div style="font-size:40px; font-weight:bold; color:#198754;">2</div>
            <h5 class="mt-2">Completá tus datos</h5>
            <p class="text-muted">
                Ingresá tus datos personales y elegí la forma de envío y pago.
            </p>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="border rounded p-4 h-100 shadow-sm">
            <div style="font-size:40px; font-weight:bold; color:#198754;">3</div>
            <h5 class="mt-2">Confirmá tu compra</h5>
            <p class="text-muted">
                Una vez realizado el pago, podés compartir el comprobante para confirmar tu pedido.
            </p>
        </div>
    </div>

</div>

    <!-- Beneficios -->
    <h2>Beneficios</h2>

    <div class="row mt-3 mb-5">
        <div class="col-md-6">
            <ul>
                <li>Atención personalizada</li>
                <li>Productos de calidad</li>
                <li>Opciones de pago flexibles</li>
            </ul>
        </div>

        <div class="col-md-6">
            <ul>
                <li>Envíos rápidos</li>
                <li>Regalos personalizados</li>
                <li>Compra segura</li>
            </ul>
        </div>
    </div>

    <!-- Boton -->
    <div class="text-center mt-5">
    <p class="mb-3">
        Por cualquier consulta o duda comunicate con nosotros por WhatsApp
    </p>

    <a href="https://wa.me/5493794032869" 
       class="btn btn-success btn-lg" 
       target="_blank">
        WhatsApp
    </a>
</div>

</div>

@endsection
