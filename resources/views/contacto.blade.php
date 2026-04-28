@extends('layouts.app')

@section('content')

<section class="contacto-premium py-5">
<div class="container">

    <!-- TITULO -->
    <div class="text-center mb-5">
        <span class="contact-badge">✨ Atención personalizada</span>
        <h1 class="mt-3">Hablemos</h1>
        <p class="contact-subtitle">
            Consultas, pedidos personalizados o dudas sobre envíos.  
            Estamos para ayudarte.
        </p>
    </div>

    <!-- CARDS SUPERIORES -->
    <div class="row g-4 mb-5">

        <!-- CARD INFO -->
        <div class="col-lg-6">
            <div class="contact-card-green">

                <div class="contact-box">

                    <div class="staff-icon">
                        <i class="bi bi-chat-heart-fill"></i>
                    </div>

                    <h4>Información</h4>
                    <span>Canales oficiales</span>

                    <ul class="contact-premium-list mt-4">

                        <li>
                            <div class="contact-mini-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            Corrientes, Argentina
                        </li>

                        <li>
                            <div class="contact-mini-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            +54 9 379 403-2869
                        </li>

                        <li>
                            <div class="contact-mini-icon">
                                <i class="bi bi-instagram"></i>
                            </div>
                            @ohanaregalos64
                        </li>

                        <li>
                            <div class="contact-mini-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            ohana.design64@gmail.com
                        </li>

                    </ul>

                    <a href="https://wa.me/5493794032869"
                       class="btn btn-light mt-4 w-100"
                       target="_blank">
                        WhatsApp Directo
                    </a>

                </div>
            </div>
        </div>

        <!-- CARD MAPA -->
        <div class="col-lg-6">
            <div class="contact-card-green">

                <div class="contact-box">

                    <div class="staff-icon">
                        <i class="bi bi-shop"></i>
                    </div>

                    <h4>Visitanos</h4>
                    <span>Punto de entrega</span>

                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.0866667727532!2d-58.82779781911692!3d-27.46386259591287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b58e5f3be77%3A0xbf4fd160d02dc912!2sFray%20Jos%C3%A9%20de%20la%20Quintana%201800-1882%2C%20W3402%20Corrientes!5e0!3m2!1ses!2sar!4v1776779209811!5m2!1ses!2sar"
                    width="100%"
                    height="260"
                    style="border:0;border-radius:18px;"
                    loading="lazy"
                    class="mt-3 mb-4">
                    </iframe>

                    <div class="horarios-box">
                        <p><strong>Lunes a Sábado</strong></p>
                        <p>09:00 a 13:00 hs</p>
                        <p>17:00 a 21:00 hs</p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- ALERTA -->
    @if(session('success'))
        <div class="alert alert-success mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORMULARIO CENTRADO -->
    <div class="row justify-content-center">

        <div class="col-lg-8">
            <div class="contact-card premium-form">

                <div class="text-center mb-4">
                    <div class="staff-icon mx-auto mb-3">
                        <i class="bi bi-send-fill"></i>
                    </div>

                    <h4>Enviarnos un mensaje</h4>
                    <p class="mb-0">
                        Respondemos consultas lo antes posible.
                    </p>
                </div>

                <form action="{{ route('contacto.enviar') }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <input type="text"
                                   name="nombre"
                                   class="form-control"
                                   placeholder="Tu nombre"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Tu email"
                                   required>
                        </div>

                        <div class="col-md-12">
                            <input type="text"
                                   name="telefono"
                                   class="form-control"
                                   placeholder="WhatsApp (opcional)">
                        </div>

                        <div class="col-md-12">
                            <textarea name="mensaje"
                                      rows="6"
                                      class="form-control"
                                      placeholder="Escribinos tu consulta..."
                                      required></textarea>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-dark w-100">
                                Enviar Consulta
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>

</div>
</section>

@endsection