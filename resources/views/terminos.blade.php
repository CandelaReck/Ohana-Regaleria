@extends('layouts.app')

@section('content')

<section class="terminos-premium py-5">

<div class="container">

    <!-- HERO -->
    <div class="text-center mb-5">
        <span class="contact-badge">📄 Información importante</span>

        <h1 class="mt-3">Términos y Condiciones</h1>

        <p class="terminos-subtitle">
            Te recomendamos leer esta información antes de realizar tu compra.
            Queremos brindarte una experiencia clara, segura y transparente.
        </p>
    </div>

    <!-- CARD PRINCIPAL -->
    <div class="terminos-card">

        <!-- INTRO -->
        <div class="terminos-head">
            <div class="terminos-icon">💚</div>

            <div>
                <h3>Compra con confianza</h3>
                <p>
                    En Ohana trabajamos con dedicación para ofrecer productos
                    especiales y una atención personalizada.
                </p>
            </div>
        </div>

        <!-- GRID -->
        <div class="row g-4 mt-2">

            <!-- BLOQUE -->
            <div class="col-md-6">
                <div class="termino-box h-100">
                    <div class="mini-icon">🎁</div>
                    <h5>Productos</h5>

                    <ul>
                        <li>Las imágenes son ilustrativas.</li>
                        <li>Los colores pueden variar según disponibilidad.</li>
                        <li>Stock sujeto a cambios sin previo aviso.</li>
                        <li>Algunos pedidos se preparan especialmente.</li>
                    </ul>
                </div>
            </div>

            <!-- BLOQUE -->
            <div class="col-md-6">
                <div class="termino-box h-100">
                    <div class="mini-icon">💳</div>
                    <h5>Formas de Pago</h5>

                    <ul>
                        <li>Transferencia bancaria.</li>
                        <li>Mercado Pago.</li>
                        <li>Efectivo en retiros acordados.</li>
                        <li>Reservas válidas por 24 hs.</li>
                    </ul>
                </div>
            </div>

            <!-- BLOQUE -->
            <div class="col-md-6">
                <div class="termino-box h-100">
                    <div class="mini-icon">🚚</div>
                    <h5>Envíos y Retiros</h5>

                    <ul>
                        <li>Envíos dentro de la zona.</li>
                        <li>Retiro por punto acordado.</li>
                        <li>El costo de envío corre por cuenta del cliente.</li>
                        <li>Las demoras externas no dependen de Ohana.</li>
                    </ul>
                </div>
            </div>

            <!-- BLOQUE -->
            <div class="col-md-6">
                <div class="termino-box h-100">
                    <div class="mini-icon">🔄</div>
                    <h5>Cambios</h5>

                    <ul>
                        <li>Solicitar dentro de las 48 hs.</li>
                        <li>Producto sin uso y en buen estado.</li>
                        <li>El traslado corre por cuenta del cliente.</li>
                        <li>No se realizan reintegros monetarios.</li>
                    </ul>
                </div>
            </div>

            <!-- BLOQUE -->
            <div class="col-md-12">
                <div class="termino-box">
                    <div class="mini-icon">❗</div>
                    <h5>Cancelación de Pedidos</h5>

                    <ul class="mb-0">
                        <li>Puede cancelarse antes del despacho.</li>
                        <li>Una vez enviado el pedido no se aceptan cancelaciones.</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <!-- CTA -->
    <div class="text-center mt-5">
        <p class="mb-3">
            ¿Tenés dudas sobre compras, pagos o envíos?
        </p>

        <a href="https://wa.me/5493794032869"
           target="_blank"
           class="btn btn-dark px-4 py-3">
           Consultar por WhatsApp
        </a>
    </div>

</div>
</section>

@endsection