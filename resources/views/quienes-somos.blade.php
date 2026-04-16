@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Quiénes Somos</h1>
    <div style="display: flex;
    align-items: center; gap: 20px;
    margin-bottom: 30px;">
    <img src="{{ asset('img/imagenFamilia.png') }}"
    alt="Familia"
    style="width:250px;
    border-radius:10px;">

    <p style="max-width:600px;">
        Somos un emprendimiento que nació con una idea simple pero muy especial: pensar en 
        cada miembro de la familia. 
    <br>
        Nuestro nombre "Ohana" significa familia, y refleja
        lo que somos y lo que queremos brindar: un espacio cálido donde puedas encontrar ese 
        detalle perfecto para cada persona, haciendoo de cada regalo un momento significativo.
    </p>
</div>

    <h2>Objetivos</h2>
    <ul>
        <li>Brindar productos de excelente calidad</li>
        <li>Ofrecer atención personalizada enfocada en las necesidades del cliente</li>
        <li>Mejorar continuamente nuestros servicios</li>
    </ul>

    <h2>Nuestra Trayectoria</h2>
    <p>
        Ohana comenzó como un pequeño emprendimiento con muchas ganas de crecer. A lo largo 
        del tiempo fuimos incorporando nuevos productos y mejorando nuestros servicios, siempre
        escuchando a nuestros clientes y adaptandonos a sus necesidades.
    </p>

    <h2>Nuestros Productos</h2>

<div style="display: flex; align-items: center; gap: 20px; font-size: 16px;">
    
    <img src="{{ asset('img/boxRegalo.jpeg') }}"
         alt="Box de regalo"
         style="width:220px; border-radius:10px;">

    <p style="font-size: 16px;">
        Ofrecemos una variedad de productos pensados para cada ocasión, incluyendo box de regalo,
        peluches, indumentaria y accesorios.
        <br>
        Cada detalle es preparado con dedicación buscando que cada regalo transmita cariño y se 
        convierta en un momento especial para quien lo recibe.
    </p>

</div>
    <h2>Staff</h2>
    <p>
        Somos un pequeño equipo que trabaja con dedicacion y compromiso para ofrecer productos
        de calidad y una atencion cercana, buscando que cada cliente se sienta parte de nuestra 
        familia.
    </p>

</div>
@endsection