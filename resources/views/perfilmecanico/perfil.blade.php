<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Mecánico') }}
        </h2>
    </x-slot>

    <div class="container mt-10 pt-5 pb-5">

        <div class="row">
            <div class="col col-12 my-3">
                <a class="btn btn-secondary" href="{{ route('welcome') }}">Regresar</a>
            </div>
            <div class="col col-4">
                <div class="card" style="background-color: #242424; color:#D9D9D9;">
                    <div class="card-header text-center" style="background-color: #3d3c3c;">
                        <h4>Información</h4>
                    </div>
                    <div class="card-body" style="">
                        <div class="text-center">
                            <img style="width: 250px" src="{{ asset($perfil->logo) }}" class="rounded" alt="IMGPerfil">
                        </div>
                        <div class="mx-5 mt-5">
                            <div class="row">
                                <div class="col col-6 mb-3">
                                    <h6><strong>Nombre del taller:</strong></h6>
                                </div>
                                <div class="col col-6 mb-3">
                                    {{ $perfil->ntaller }}
                                </div>
                                <div class="col col-6 mb-3">
                                    <h6><strong>Nombre del propietario:</strong></h6>
                                </div>
                                <div class="col col-6 mb-3">
                                    Kerin xd
                                </div>
                                <div class="col col-6 mb-3">
                                    <h6><strong>Numero:</strong></h6>
                                </div>
                                <div class="col col-6 mb-3">
                                    {{ $perfil->numerocontacto }}
                                </div>
                                <div class="col col-6 mb-3">
                                    <h6><strong>Dirección</strong></h6>
                                </div>
                                <div class="col col-6 mb-3">
                                    {{ $perfil->direccion }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col col-8">
                <div class="card" style="background-color: #32525C; color:#ffffff;">
                    <div class="card-header text-center" style="background-color: #395f6b;">
                        <h4>Servicios</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($serviciosPerfil as $servicio)
                                <li class="list-group-item"
                                    style="background-color: #1279c1; color:#ffffff; border:1px solid #0f69a8">
                                    <div class="row g-0">
                                        <div class="col-md-3 d-flex align-items-center">
                                            <img style="width: 158px; height: 158px;" src="{{ asset($servicio->logo) }}"
                                                class="img-fluid rounded-start" alt="IMG SERVICIO">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $servicio->servicios }}</h5>
                                                <p class="card-text">
                                                    Tipo de servicio: {{ $servicio->tipoServicio }}
                                                </p>
                                                <p class="card-text d-flex justify-content-end">
                                                    Precio: ${{ $servicio->precio }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </div>


    </div>
</x-app-layout>
