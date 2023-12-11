@extends('sitioweb')
@section('content')
    <main class=" background-image">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

            .bold-text {
                font-weight: bold;
            }

            .background-image {
                background-image: url('/imagenes/fondo4.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
        </style>

        <br>

        <div class="row">

            <div class="container ">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('servicios-mecanicos.indexinterno') }}" class="btn btn-outline-primary"><em
                                class='bx bx-arrow-back bx-flashing bx-flip-vertical'></em> REGRESAR</a>
                    </div>
                    <div class="col-12">
                        <div class="card mt-3 text-bg-dark border-primary">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                    <div>
                                        <img style="height: 70%" src="{{ asset($servicioMecanico->logo) }}"
                                            class="img-fluid rounded img-thumbnail" alt="servicio">
                                    </div>

                                </div>
                                <div class="col-md-8 px-0">
                                    <div class="card-header  bg-primary">
                                        <h4 class="bold-text card-title text-center">{{ $servicioMecanico->servicios }}
                                        </h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Descripcion del servicio:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>{{ $servicioMecanico->descripcion }}</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Tipo de servicio:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>{{ $servicioMecanico->tipoServicio }}</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Horario:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>
                                                    {{ $servicioMecanico->fechaInicio }} -
                                                    {{ $servicioMecanico->fechaFin }}
                                                </h5>
                                                <h5>{{ $servicioMecanico->hora1 }} - {{ $servicioMecanico->hora2 }}</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Dirección:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>{{ $servicioMecanico->direccion }}</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Rubro:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>{{ $servicioMecanico->rubro }}</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Numero de contacto:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>{{ $servicioMecanico->contacto }}</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5 class="bold-text">Precio del servicio:</h5>
                                            </div>
                                            <div class="my-2 col-12 col-md-6">
                                                <h5>$ {{ $servicioMecanico->precio }}</h5>
                                            </div>
                                            <div class="col-12 my-2 d-flex justify-content-end">
                                                <a href="{{ route('perfilmecanico.show2', $servicioMecanico->id_perfil) }}"
                                                    class="btn btn-primary btn-block"><em class='bx bxs-user'></em>
                                                    Perfil</a>
                                            </div>
                                            <div class="col-12 my-2">
                                                <a class="btn btn-outline-primary btn-lg"
                                                    href="{{ route('contrataciones.create', $servicioMecanico->id) }}"
                                                    style="width: 100%;">
                                                    <em class='bx bx-shield-quarter bx-tada'></em> Contratar Servicio
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>

            </div>
        @endsection
</main>
