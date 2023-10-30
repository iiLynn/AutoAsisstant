<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido') }}
        </h2>

    </x-slot>



    <br>

    @role('admin')
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h1 class="text-center">AUTOASSISTANT</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>ERES UN ADMIN &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
            </div>
        </div>
    @endrole

    @role('conductor')
        <style>
            body {
                background-color: #f0f0f0;
                font-family: Arial, sans-serif;
            }

            .container {
                max-width: 600px;
                margin: 100 auto;
                padding: 0px;
                text-align: center;
            }

            /* Establecer el estilo del contenedor de imagen y texto */
            .carousel-item {
                position: relative;
                border: 2px solid white;
                background-color: black;
            }

            .carousel-caption {
                background-color: black;
                color: #fff;
                position: static;
                padding: 5px;


            }

            .carousel-caption h3 {
                font-size: 0px;
                margin: 0;
            }

            .carousel-caption p {
                font-size: 16px;
                margin: 0;
                color: white;
            }

            /* Establecer el tamaño de las imágenes en el carrusel */
            .carousel-inner img {
                max-width: 10cm;
                max-height: 5cm;
                width: 10;
                height: 6;
            }

            .carouselConsejos {
                height: 300px;
                /* Cambia la altura según tus necesidades */
            }
        </style>

        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h1 class="text-center">AUTOASSISTANT</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>ERES UN CONDUCTOR &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
            </div>
        </div>
    @endrole

    @role('futuro_conductor')
        <style>
            body {
                background-color: #f0f0f0;
                font-family: Arial, sans-serif;
            }

            .container {
                max-width: 600px;
                margin: 100 auto;
                padding: 0px;
                text-align: center;
            }

            /* Establecer el estilo del contenedor de imagen y texto */
            .carousel-item {
                position: relative;
                border: 2px solid white;
                background-color: black;
            }

            .carousel-caption {
                background-color: black;
                color: #fff;
                position: static;
                padding: 5px;


            }

            .carousel-caption h3 {
                font-size: 0px;
                margin: 0;
            }

            .carousel-caption p {
                font-size: 16px;
                margin: 0;
                color: white;
            }

            /* Establecer el tamaño de las imágenes en el carrusel */
            .carousel-inner img {
                max-width: 10cm;
                max-height: 5cm;
                width: 10;
                height: 6;
            }

            .carouselConsejos {
                height: 300px;
                /* Cambia la altura según tus necesidades */
            }
        </style>
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h1 class="text-center">AUTOASSISTANT</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>ERES UN FUTURO CONDUCTOR &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span>
                    </h4>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
            </div>
        </div>
    @endrole

    @role('taller_mecanico')
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h1 class="text-center">AUTOASSISTANT</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>ERES UN TALLER MECANICO &#128526;<span class="badge bg-primary">{{ Auth::user()->name }}</span></h4>
                    <a href="{{ route('perfil.index') }}" class="btn btn-primary">PERFIL DE MECANICO</a>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
            </div>
        </div>
    @endrole

    @role('mecanico_independiente')
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h1 class="text-center">AUTOASSISTANT</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>ERES UN MECANICO INDEPENDIENTE &#128526;<span
                            class="badge bg-primary">{{ Auth::user()->name }}</span></h4> <a
                        href="{{ route('perfil.index') }}" class="btn btn-primary">PERFIL DE MECANICO</a>
                    <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>-->
                </blockquote>
            </div>
        </div>
        @section('content')
        @endrole

    </x-app-layout>
