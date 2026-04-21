@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color:#4E6252;">Términos y Condiciones</h1>
        <p style="color:#6F8573;">Lea atentamente la información antes de realizar una compra</p>
    </div>

    <div class="card shadow-sm border-0" style="background:#ffffff; border:1px solid #EDE7DD;">
        <div class="card-body p-4 p-md-5">

            <section class="mb-4">
                <h5 class="fw-bold" style="color:#4E6252;">Información General</h5>
                <p style="color:#6F8573;" class="mb-0">
                    Ofrecemos una variedad de productos pensados para cada ocasión, incluyendo box de regalo,
                    peluches, indumentaria y accesorios. Al realizar una compra, el cliente acepta los
                    siguientes términos y condiciones.
                </p>
            </section>

            <hr style="border-color:#EDE7DD;">

            <section class="mb-4">
                <h5 class="fw-bold" style="color:#4E6252;">Productos</h5>
                <ul style="color:#6F8573;" class="mb-0">
                    <li>Las imágenes son ilustrativas.</li>
                    <li>Los colores pueden variar según disponibilidad.</li>
                    <li>Los productos están sujetos a stock.</li>
                    <li>Algunos productos pueden ser armados a pedido.</li>
                </ul>
            </section>

            <hr style="border-color:#EDE7DD;">

            <section class="mb-4">
                <h5 class="fw-bold" style="color:#4E6252;">Formas de Pago</h5>
                <ul style="color:#6F8573;" class="mb-0">
                    <li>Transferencia bancaria</li>
                    <li>Mercado Pago</li>
                    <li>Efectivo (solo cuando se retira)</li>
                </ul>

                <p class="mt-3" style="color:#6F8573;">
                    Los pedidos se reservan por un período de 24 horas desde su realización.
                    Pasado ese plazo, si no se recibe el comprobante de pago, el pedido será 
                    cancelado automáticamente.
                </p>
            </section>

            <hr style="border-color:#EDE7DD;">

            <section class="mb-4">
                <h5 class="fw-bold" style="color:#4E6252;">Envíos y Retiros</h5>
                <ul style="color:#6F8573;" class="mb-0">
                    <li>Realizamos envíos a domicilio.</li>
                    <li>También ofrecemos retiro por punto acordado.</li>
                    <li>El costo de envío corre por cuenta del cliente.</li>
                    <li>No nos responsabilizamos por demoras del servicio de mensajería.</li>
                </ul>
            </section>

            <hr style="border-color:#EDE7DD;">

            <section class="mb-4">
                <h5 class="fw-bold" style="color:#4E6252;">Cambios y Devoluciones</h5>
                <ul style="color:#6F8573;" class="mb-0">
                    <li>Los cambios deben solicitarse dentro de las 48 horas.</li>
                    <li>El producto debe estar sin uso y en perfectas condiciones.</li>
                    <li>El costo de envío por cambio corre por cuenta del cliente.</li>
                    <li>No se realizan devoluciones de dinero.</li>
                </ul>
            </section>

            <hr style="border-color:#EDE7DD;">

            <section>
                <h5 class="fw-bold" style="color:#4E6252;">Cancelación de Pedidos</h5>
                <ul style="color:#6F8573;" class="mb-0">
                    <li>Los pedidos pueden cancelarse antes del envío.</li>
                    <li>Una vez enviado el pedido no se aceptan cancelaciones.</li>
                </ul>
            </section>

        </div>
    </div>

</div>

@endsection