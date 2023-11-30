@extends('sitioweb')

@section('content')


    <style scoped>
        .show {
            width: auto !important;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #1279c1 !important;
            background-color: rgb(255, 255, 255) !important;
            border-color: #dee2e6 #dee2e6 #fff !important;
            min-width: 150px;
            padding: 10px;
        }

        .custom-card {
            border: 2px solid blue;
            /* Borde azul */
            min-height: 320px;
            position: relative;
            background: none;
            /* Sin fondo de gradiente */
            overflow: hidden;
        }

        .image-container {
            position: relative;
            z-index: 1;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Mecanicos') }}
        </h2>
    </x-slot>
    <br>
    <nav>
        <div class="d-flex justify-content-center  nav-tabs text-white" id="nav-tab" role="tablist">
            <button class=" nav-link active bg-primary" id="nav-servicios-tab" data-bs-toggle="tab"
                data-bs-target="#nav-servicios" type="button" role="tab" aria-controls="nav-servicios"
                aria-selected="true">Servicios</button>
            <button class="nav-link bg-primary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Perfiles de
                Mecánico</button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-servicios" role="tabpanel" aria-labelledby="nav-servicios-tab"
            tabindex="0">
            <div class="contaniner my-2">
                <div class="row">
                    <div class="col col-md-2 col-sm-12">
                        <div class="card text-white text-center"
                            style="background: rgb(18,121,193); background: linear-gradient(0deg, rgba(0,0,255,1)0%, rgb(18,121,193,1) 100%);">
                            <div class="card-body">
                                <h6 class="card-title">Rubros de talleres</h6>
                                <form id="buscarForm">
                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="rubro[]"
                                            value="Mecanico" onchange="buscarServicios()">
                                        <label class="form-check-label" for="flexCheckDefault">Mecanico</label>
                                    </div>
                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="rubro[]"
                                            value="Electronico" onchange="buscarServicios()">
                                        <label class="form-check-label" for="flexCheckDefault">Electronico</label>
                                    </div>
                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="rubro[]"
                                            value="Enderezado y Pintura" onchange="buscarServicios()">
                                        <label class="form-check-label" for="flexCheckDefault">Enderezado y
                                            Pintura</label>
                                    </div>
                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="rubro[]"
                                            value="General de Caja" onchange="buscarServicios()">
                                        <label class="form-check-label" for="flexCheckDefault">General de Caja</label>
                                    </div>
                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="rubro[]"
                                            value="Lubricentro" onchange="buscarServicios()">
                                        <label class="form-check-label" for="flexCheckDefault">Lubricentro</label>
                                    </div>
                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="rubro[]"
                                            value="Llanteria" onchange="buscarServicios()">
                                        <label class="form-check-label" for="flexCheckDefault">Llanteria</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-10 col-sm-12">
                        <div class="containerCard d-flex flex-row flex-wrap">
                            @if ($serviciosMecanicos && $serviciosMecanicos->count() > 0)
                                @foreach ($serviciosMecanicos as $index => $servicio)
                                    <div class="col-md-3 mb-3 servicio-card {{ $servicio->rubro }}">
                                        <div class="card"
                                            style="background:transparent; border: solid blue; min-height:450px;">
                                            <a href="{{ route('servicios-mecanicos.show1', $servicio->id) }}">
                                                <div class="text-center mt-1">
                                                    <img src="{{ $servicio->logo }}" class="img-thumbnail"
                                                        alt="IMG_SERVICIO" style="height:234px; width:234px;">
                                                </div>
                                                <div class="card-body pt-0">
                                                    <h5 class="card-title">{{ $servicio->representante }}</h5>
                                                    <p class="card-text text-white">Rubro: {{ $servicio->rubro }}</p>
                                                    <p class="card-text text-white">Servicio:
                                                        {{ $servicio->servicios }}
                                                    </p>
                                                    <p class="card-text text-white">Tipo de servicio:
                                                        {{ $servicio->tipoServicio }}
                                                    </p>
                                                    <p class="card-text text-white">Costo estimado:
                                                        ${{ $servicio->precio }}
                                                    </p>
                                                </div>
                                                </b>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12 text-white">
                                    <p class="alert alert-danger">No se encontraron resultados</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="container my-2">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="card" style="background:transparent; border: solid blue;">
                            <div class="card-header text-center" style="background-color: #111212;">
                                <h5 class="text-white">Busqueda</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-md-7">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="q" name="q"
                                                placeholder="Nombre del mecanico o taller mecanico" aria-label="q"
                                                value="{{ old('q') }}">
                                            <label for="q">Busqueda por Nombre</label>
                                            <x-input-error :messages="$errors->get('q')" class="alert alert-danger" role="alert" />
                                        </div>
                                    </div>
                                    <div class="col col-md-5 d-flex align-items-center">
                                        <button type="button" class="btn btn-primary px-4"
                                            onclick="filtrarResultados()">
                                            <i class='bx bx-search-alt-2'></i>
                                            Buscar
                                        </button>
                                        <button type="button" class="btn btn-secondary mx-2 px-4"
                                            onclick="limpiarResultados()">
                                            <i class='bx bx-trash'></i>
                                            Limpiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-12 my-2">
                        <div id="resultadosContainer" class="d-flex flex-row flex-wrap">
                            @if ($perfiles && $perfiles->count() > 0)
                                @foreach ($perfiles as $perfil)
                                    <div class="col-md-3 mb-3">
                                        <div class="card custom-card">
                                            <a href="{{ route('perfilmecanico.show', $perfil->id) }}">
                                                <div class="text-center mt-1 image-container">
                                                    <img src="{{ $perfil->logo }}" class="img-thumbnail rounded-circle"
                                                        alt="IMG_SERVICIO" style="height:204px; width:204px;">
                                                </div>
                                                <div class="card-body text-white text-center">
                                                    <h6 class="card-text">
                                                        <i class='bx bxs-user'></i>
                                                        Representante: {{ $perfil->representante }}
                                                    </h6>
                                                    <h6 class="card-text">
                                                        <i class='bx bxs-car-mechanic'></i>
                                                        Taller mecanico: {{ $perfil->ntaller }}
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12 text-white">
                                    <p class="alert alert-danger">No se encontraron resultados</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        /*SECCION DE BUSQUEDA POR RUBRO*/
        // Evento para capturar los cambios en los checkboxes de rubros
        $('input[name="rubro[]"]').change(function() {
            buscarServicios();
        });

        function buscarServicios() {
            var rubrosSeleccionados = $('input[name="rubro[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            // Ocultar todos los elementos de la cuadrícula
            $('.servicio-card').show();

            // Mostrar los elementos que coinciden con los rubros seleccionados
            if (rubrosSeleccionados.length > 0) {
                $('.servicio-card').hide();
                rubrosSeleccionados.forEach(function(rubro) {
                    $('.' + rubro).show();
                });
            }

            // Mostrar mensaje cuando no hay resultados
            if ($('.servicio-card:visible').length === 0) {
                if ($('.no-results-message').length === 0) {
                    $('.container.d-flex.flex-row.flex-wrap').append(
                        '<p class="no-results-message alert alert-danger">No se encontraron resultados</p>');
                }
            } else {
                $('.no-results-message').remove();
            }

            // Modificar la URL sin recargar la página
            var state = {
                rubros: rubrosSeleccionados
            };
            var url = window.location.href.split('?')[0] + '?rubros=' + rubrosSeleccionados.join(',');
            history.pushState(state, '', url);
        }


        // Evento para controlar el retroceso del navegador
        window.onpopstate = function(event) {
            if (event.state && event.state.rubros) {
                $('input[name="rubro[]"]').prop('checked', false);
                var rubrosSeleccionados = event.state.rubros;
                for (var i = 0; i < rubrosSeleccionados.length; i++) {
                    $('input[name="rubro[]"][value="' + rubrosSeleccionados[i] + '"]').prop('checked', true);
                }
                buscarServicios();
            }
        };

        /*SECCION DE BUSQUEDA DE PERFILES */
        const perfiles = {!! json_encode($perfiles) !!}; // Obtén los perfiles desde el servidor

        function filtrarResultados() {
            const searchTerm = document.getElementById('q').value.toLowerCase();

            const resultadosFiltrados = perfiles.filter(perfil =>
                (perfil.representante && perfil.representante.toLowerCase().includes(searchTerm)) ||
                (perfil.ntaller && perfil.ntaller.toLowerCase().includes(searchTerm))
            );

            mostrarResultados(resultadosFiltrados);
        }


        function limpiarResultados() {
            document.getElementById('q').value = ''; // Limpiar el campo de búsqueda
            mostrarResultados(perfiles); // Mostrar todos los resultados nuevamente
        }

        function mostrarResultados(resultados) {
            const resultadosContainer = document.getElementById('resultadosContainer');
            resultadosContainer.innerHTML = ''; // Limpiar los resultados anteriores

            if (resultados.length > 0) {
                resultados.forEach(perfil => {
                    const card = document.createElement('div');
                    card.className = 'col-md-3 mb-3';
                    card.innerHTML = `
                    <div class="card custom-card">
                        <a href="{{ route('perfilmecanico.show', $perfil->id) }}">
                            <div class="text-center mt-1 image-container">
                                <img src="{{ $perfil->logo }}"
                                    class="img-thumbnail rounded-circle" alt="IMG_SERVICIO"
                                    style="height:204px; width:204px;">
                            </div>
                            <div class="card-body text-white text-center">
                                <h6 class="card-text">
                                    <i class='bx bxs-user'></i>
                                    Representante: {{ $perfil->representante }}
                                </h6>
                                <h6 class="card-text">
                                    <i class='bx bxs-car-mechanic'></i>
                                    Taller mecanico: {{ $perfil->ntaller }}
                                </h6>
                            </div>
                        </a>
                    </div>
                    `;
                    resultadosContainer.appendChild(card);
                });
            } else {
                const noResultados = document.createElement('div');
                noResultados.className = 'col-md-12 text-white';
                noResultados.innerHTML = '<p class="alert alert-danger">No se encontraron resultados</p>';
                resultadosContainer.appendChild(noResultados);
            }
        }
    </script>
    <script></script>





    </body>

@endsection
