@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- QUIENES SOMOS -->
    <div class="text-center mb-5">
        <h1>Quiénes Somos</h1>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-5 text-center">
            <img src="{{ asset('img/imagenFamilia.png') }}"
                 class="img-fluid rounded"
                 style="max-width:280px;">
        </div>

        <div class="col-md-7">
            <p>
                Somos un emprendimiento que nació con una idea simple pero muy especial:
                pensar en cada miembro de la familia.
            </p>

            <p>
                Nuestro nombre "Ohana" significa familia, y refleja lo que somos y lo
                que queremos brindar: un espacio cálido donde puedas encontrar ese detalle
                perfecto para cada persona, haciendo de cada regalo un momento significativo.
            </p>
        </div>
    </div>

</div>


<!-- OBJETIVOS -->
<section style="background:#f8f9fa; padding:60px 0;">
<div class="container">

    <h2 class="text-center mb-5">Nuestros Objetivos</h2>

    <div class="row text-center">

        <div class="col-md-4">
            <div class="p-4">
                <div style="font-size:40px;">🎁</div>
                <h5>Calidad</h5>
                <p>Brindar productos de excelente calidad para cada ocasión.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4">
                <div style="font-size:40px;">💬</div>
                <h5>Atención personalizada</h5>
                <p>Ofrecer atención enfocada en las necesidades de cada cliente.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4">
                <div style="font-size:40px;">📈</div>
                <h5>Mejora continua</h5>
                <p>Mejorar constantemente nuestros productos y servicios.</p>
            </div>
        </div>

    </div>

</div>
</section>


<!-- TRAYECTORIA -->
<!-- Trayectoria -->
<div class="container py-5">

    <h2 class="text-center mb-5">Nuestra Trayectoria</h2>

    <div class="row align-items-center">
        
        <div class="col-md-5 text-center">
            <img src="{{ asset('img/trayectoria.png') }}"
                 class="img-fluid rounded"
                 style="max-width:260px;">
        </div>

        <div class="col-md-7">
            <p>
                Ohana comenzó como un pequeño emprendimiento con muchas ganas de crecer,
                enfocado en ofrecer detalles únicos para cada ocasión.
            </p>

            <p>
                Con el tiempo fuimos incorporando nuevos productos y mejorando nuestros
                servicios, adaptándonos a las necesidades de nuestros clientes.
            </p>

            <p class="mb-0">
                Actualmente seguimos creciendo y trabajando con dedicación para brindar
                una experiencia cálida y personalizada en cada compra.
            </p>
        </div>

    </div>

</div>


<!-- PRODUCTOS -->
<section style="background:#f8f9fa; padding:60px 0;">
<div class="container">

    <h2 class="text-center mb-5">Nuestros Productos</h2>

    <div class="row align-items-center">
        <div class="col-md-5 text-center">
            <img src="{{ asset('img/boxRegalo.jpeg') }}"
                 class="img-fluid rounded"
                 style="max-width:260px;">
        </div>

        <div class="col-md-7">
            <p>
                Ofrecemos una variedad de productos pensados para cada ocasión,
                incluyendo box de regalo, peluches, indumentaria y accesorios.
            </p>

            <p>
                Cada detalle es preparado con dedicación buscando que cada regalo
                transmita cariño y se convierta en un momento especial.
            </p>
        </div>
    </div>

</div>
</section>


<!-- STAFF -->
<div class="container py-5">

    <h2 class="text-center mb-5">Nuestro Equipo</h2>

    <div class="row text-center">

        <div class="col-md-4">
            <img src="{{ asset('img/Atencion al cliente.jpg') }}"
                 class="img-fluid rounded mb-3"
                 style="height:250px; object-fit:cover; width:100%;">

            <h5>Belén</h5>
            <p>Atención al cliente</p>
        </div>

        <div class="col-md-4">
            <img src="{{ asset('img/ArmadoPedido.jpg') }}"
                 class="img-fluid rounded mb-3"
                 style="height:250px; object-fit:cover; width:100%;">

            <h5>Carla</h5>
            <p>Armado de pedidos</p>
        </div>

        <div class="col-md-4">
            <img src="{{ asset('img/DiseñoPersonalizacion.jpg') }}"
                 class="img-fluid rounded mb-3"
                 style="height:250px; object-fit:cover; width:100%;">

            <h5>Axel</h5>
            <p>Diseño y personalización</p>
        </div>

    </div>

</div>

@endsection