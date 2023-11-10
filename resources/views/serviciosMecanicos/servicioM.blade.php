<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios Mecanicos') }}
        </h2>
    </x-slot>
    <br>
    <div class="row">

        <div class="col col-md-2 col-sm-12">
            <div class="card text-white"
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
                            <label class="form-check-label" for="flexCheckDefault">Enderezado y Pintura</label>
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
        <div class="col col-md-10">
            <div class="grid container d-flex flex-row flex-wrap">
                @if ($serviciosMecanicos && $serviciosMecanicos->count() > 0)
                    @foreach ($serviciosMecanicos as $index => $servicio)
                        <div class="col-md-3 mb-3">
                            <div class="card resultados"
                                style="background:transparent; border: solid blue; height:450px; width:245px;">
                                <div class="grid-item grid-item-{{ $index }}" data-rubro="{{ $servicio->rubro }}"
                                    data-servicios="{{ json_encode($servicio->servicios) }}">

                                    <a href="{{ route('servicios-mecanicos.show', $servicio->id) }}">
                                        <div class="text-center">
                                            <img src="{{ $servicio->logo }}" class="img-thumbnail" alt="IMG_SERVICIO"
                                                style="height:234px; width:234px;">
                                        </div>
                                        <div class="card-body pt-0">
                                            <h5 class="card-title">{{ $servicio->representante }}</h5>
                                            <p class="card-text text-white">Rubro: {{ $servicio->rubro }}</p>
                                            <p class="card-text text-white">Servicio: {{ $servicio->servicios }}</p>
                                            <p class="card-text text-white">Tipo de servicio:
                                                {{ $servicio->tipoServicio }}
                                            </p>
                                            <p class="card-text text-white">Costo estimado:
                                                ${{ $servicio->precio }}
                                            </p>
                                        </div>
                                        </b>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-white">
                        <p>No se encontraron resultados</p>
                    </div>
                @endif
            </div>



        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Evento para capturar los cambios en los checkboxes de rubros
        $('input[name="rubro[]"]').change(function() {
            buscarServicios();
        });

        // Función para realizar la búsqueda y mostrar los resultados
        // Función para realizar la búsqueda y mostrar los resultados
        function buscarServicios() {
            var rubrosSeleccionados = $('input[name="rubro[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            // Ocultar todos los elementos de la cuadrícula
            $('.resultados').parent().hide();

            // Mostrar los elementos que coinciden con los rubros seleccionados
            $('.resultados').each(function() {
                var rubro = $(this).parent().attr('data-rubro');
                if (rubrosSeleccionados.length === 0 || rubrosSeleccionados.includes(rubro)) {
                    $(this).parent().show();
                }
            });

            // Mostrar mensaje cuando no hay resultados
            if ($('.resultados:visible').length === 0) {
                if ($('.no-results-message').length === 0) {
                    $('.container.d-flex.flex-row.flex-wrap').append(
                        '<p class="no-results-message text-white">No se encontraron resultados</p>');
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
    </script>
    


</x-app-layout>
