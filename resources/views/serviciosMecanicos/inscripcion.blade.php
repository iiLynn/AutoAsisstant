<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/flatpickr.min.css">
<style scoped>
    @media screen and (min-width: 768px) {
        .show {
            width: auto !important;
        }
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #ffffff !important;
        background-color: #858484 !important;
        border-color: #dee2e6 #dee2e6 #fff !important;
        min-width: 500px;
        /* Ajusta el ancho mínimo según tus preferencias */
        padding: 10px;
        /* Ajusta el espacio alrededor del texto dentro del botón */
    }

    .center-content {
        display: flex;
        flex-direction: column;
        align-items: center;



    }
</style>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion de servicios') }}
        </h2>
    </x-slot>
    <br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <br>
        <nav>
            <div class="d-flex justify-content-center nav-tabs text-primary" id="nav-tab" role="tablist">
                <button class="nav-link active col-md-5" id="nav-home-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                    aria-selected="true">Inscripción</button>
                <button class="nav-link col-md-5" id="nav-profile-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">Montos</button>

            </div>
        </nav>
        <br>
        <div class="tab-content bg-white" id="nav-tabContent">
            <div style="background-color: #000; border: 2px solid white;"class="tab-pane fade show active"
                id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="container">
                    <div class="row center-content">
                        <br>
                        <br>
                        <div class="form-floating col-md-7">

                            <input type="file" class="form-control" id="logo" name="logo"
                                accept=".png, .jpg, .jpeg">
                            <br>
                            <label for="logo">Logo</label>
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert" />
                        </div>

                        <div class="form-floating col-md-7 mt-3">
                            <select id="rubro" name="rubro" class="form-select">
                                <option disabled selected>Rubro...</option>
                                <option value="Mecanico">Mecanico</option>
                                <option value="Lubricentro">Lubricentro</option>
                                <option value="Electronico">Electronico</option>
                                <option value="Enderezado y Pintura">Enderezado y Pintura</option>
                                <option value="General de Caja">General de Caja</option>
                                <option value="Llanteria">Llanteria</option>
                            </select>
                            <label for="rubro">Selecciona un Rubro</label>
                            <x-input-error :messages="$errors->get('rubro')" class="alert alert-danger" role="alert" />
                        </div>

                        <br>
                        <div class="form-floating col-md-7 mt-3">
                            <select id="servicio" name="servicio" class="form-select">
                                <option disabled selected>Servicio que Ofrece...</option>
                            </select>
                            <label for="servicio">Servicio que Ofrece</label>
                            <x-input-error :messages="$errors->get('servicio')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <div class="form-floating col-md-7 mt-3">
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Descripcion">{{ old('descripcion') }}</textarea>
                            <label for="descripcion">Descripcion del servicio</label>
                            <x-input-error :messages="$errors->get('descripcion')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <div class="form-floating col-md-7 mt-3">
                            <select id="tipoServicio" name="tipoServicio" class="form-select">
                                <option disabled selected>Tipo Servicio...</option>
                                <option value="Adomicilio">Adomicilio</option>
                                <option value="Cita/Reserva">Cita en Taller</option>
                            </select>
                            <label for="tipoServicio">Selecciona un Tipo de Servicio</label>
                            <x-input-error :messages="$errors->get('tipoServicio')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <br>
                    </div>
                </div>


            </div>
            <div style="background-color: #000; border: 2px solid white;" class="tab-pane fade" id="nav-profile"
                role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="container py-3">
                    <div class="row  center-content">
                        <br>
                        <div class="form-floating col-md-7">

                            <select id="fechaInicio" name="fechaInicio" class="form-select">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                            <label for="fechaInicio">Horario de Inicio</label>
                            <x-input-error :messages="$errors->get('horarioInicio')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <div class="form-floating col-md-7 mt-3">

                            <select id="fechaFin" name="fechaFin" class="form-select">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                            <label for="fechaFin">Horario de Fin</label>
                            <x-input-error :messages="$errors->get('horarioFin')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <div class="form-floating col-md-7 mt-3">
                            <input type="text" class="form-control timepicker" id="hora1" name="hora1"
                                placeholder="Hora 1" aria-label="Hora 1" value="{{ old('hora1') }}">
                            <label for="hora1">Hora de Apertura</label>
                            <x-input-error :messages="$errors->get('hora1')" class="alert alert-danger" role="alert" />
                        </div>
                        v <br>
                        <div class="form-floating col-md-7 mt-3">
                            <input type="text" class="form-control timepicker" id="hora2" name="hora2"
                                placeholder="Hora 2" aria-label="Hora 2" value="{{ old('hora2') }}">
                            <label for="hora2">Hora de Cierre</label>
                            <x-input-error :messages="$errors->get('hora2')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <div class="form-floating col-md-7 mt-3">
                            <input type="text" class="form-control" id="precio" name="precio"
                                placeholder="precio" inputmode="numeric" pattern="[0-9\s]*"
                                title="Ingresa un formato telefonico valido" aria-label="precio"
                                value="{{ old('precio') }}">
                            <label for="precio">Costo estimado</label>
                            <x-input-error :messages="$errors->get('precio')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        <div class="form-floating col-md-7 mt-3">
                            <input type="text" class="form-control" id="precioes" name="precioes"
                                placeholder="precio" inputmode="numeric" pattern="[0-9\s]*"
                                title="Ingresa un formato telefonico valido" aria-label="precio"
                                value="{{ old('precioes') }}">
                            <label for="precioes">Costo de Envio</label>
                            <x-input-error :messages="$errors->get('precioes')" class="alert alert-danger" role="alert" />
                        </div>
                        <br>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="col-md-7 mt-3 d-flex justify-content-between">
                            <a href="{{ route('servicios-mecanicos.index') }}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Inscribir servicio</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/flatpickr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function() {
        console.log("Removing messages...");

        var successMessage = $('.alert.alert-success');
        var errorMessage = $('.alert.alert-danger');

        if (successMessage.length > 0) {
            setTimeout(function() {
                successMessage.hide();
            }, 4000); // 4000 milisegundos (4 segundos)
        }

        if (errorMessage.length > 0) {
            setTimeout(function() {
                errorMessage.hide();
            }, 4000); // 4000 milisegundos (4 segundos)
        }
        flatpickr('.timepicker', {
            enableTime: true,
            noCalendar: true,
            dateFormat: 'h:i K',
        });

        const rubroSelect = document.getElementById('rubro');
        const servicioSelect = document.getElementById('servicio');

        const serviciosPorRubro = {
            "Mecanico": [
                "Cambio de bujías.",
                "Cambio de aceite y filtro.",
                "Cambio de faja del alternador",
                "Cambio de frenos o regulacion",
                "Cambio o rectificación de discos de frenos",
                "Cambios de soporte de motor",
                "Cambio de amortiguadores",
                "Cambio de líquido de frenos",
                "Cambio de motor",
                "Cambio de bomba de frenos",
                "Reapriete de suspension",
                "Cambio de tijeras",
            ],
            "Lubricentro": [
                "Cambio de aceite.",
                "Lavado y lubricación de chasis.",
                "Cambio de filtro de aire.",
                "Cambio de refrigerante",
                "Lubricacion de suspencion",
                "Cambio de aceite de trasmicion",
            ],
            "Electronico": [
                " Instalación de batería",
                " Reprogramacions y configuracion de control",
                " Revisión de cableado eléctrico ",
                "Cambio de computadora ",
                " Cambio de alternador ",
                " Cambio de luces ",
                " Cambio de tablero del vehículo",
                "Instalación de scanner ",
            ],
            "General de Caja": [
                "Cambio de convertidor ",
                "Cambio de sincronizados ",
                "Cambio de flechas de trasmisión",
                "Cambio de filtro de aceite de caja",
            ],
            "Enderezado y Pintura": [
                "Enderezado de chasis ",
                "Cambio de bomper",
                "Cambio de parilla",
                "Enderezado de puertas",
                "Pintura general",
                "Pulido de espejos y faros",
                "Cambio de faldones",
            ],
            "Llanteria": [
                "Cambio de llanta",
                "Relación de fuga de llanta ",
                "Aliniado y balanceado",
                "Regulación de aire ",
            ],
        };

        rubroSelect.addEventListener('change', function() {
            const selectedRubro = rubroSelect.value;
            const servicios = serviciosPorRubro[selectedRubro];

            servicioSelect.innerHTML = '';

            servicios.forEach(servicio => {
                const option = document.createElement('option');
                option.value = servicio;
                option.textContent = servicio;
                servicioSelect.appendChild(option);
            });
        });
    });

    $(document).ready(function() {
        // Define las opciones deshabilitadas para Tipo de Servicio para cada rubro
        const opcionesDeshabilitadas = {
            "Mecanico": {
                "Cambio de bujías.": [""],
                "Cambio de faja del alternador": [""],
                "Cambio de frenos o regulacion": [""],
                "Cambio o rectificación de discos de frenos": ["Adomicilio"],
                "Cambios de soporte de motor": ["Adomicilio"],
                "Cambio de amortiguadores": ["Adomicilio"],
                "Cambio de líquido de frenos": [""],
                "Cambio de motor": ["Adomicilio"],
                "Cambio de bomba de frenos": [""],
                "Reapriete de suspension": ["Adomicilio"],
                "Cambio de tijeras": ["Adomicilio"],
            },
            "Lubricentro": {
                "Cambio de filtro de aceite.": ["Adomicilio"],
                "Cambio de aceite.": ["Adomicilio"],
                "Lavado y lubricación de chasis.": ["Adomicilio"],
                "Cambio de filtro de aire.": ["Adomicilio"],
                "Cambio de refrigerante": ["Adomicilio"],
                "Lubricacion de suspencion": ["Adomicilio"],
                "Cambio de aceite de trasmicion": ["Adomicilio"],
            },
            "Electronico": {
                "Instalación de batería": [""],
                "Reprogramacions y configuracion de control": [""],
                "Revisión de cableado eléctrico ": ["Adomicilio"],
                "Cambio de computadora ": ["Adomicilio"],
                "Cambio de alternador ": ["Adomicilio"],
                "Cambio de luces ": [""],
                "Cambio de tablero del vehículo": ["Adomicilio"],
                "Instalación de scanner ": [""],
            },
            "General de Caja": {
                "Cambio de convertidor ": ["Adomicilio"],
                "Cambio de sincronizados ": ["Adomicilio"],
                "Cambio de flechas de trasmisión": ["Adomicilio"],
                "Cambio de filtro de aceite de caja": ["Adomicilio"],
            },
            "Enderezado y Pintura": {
                "Enderezado de chasis ": ["Adomicilio"],
                "Cambio de bomper": ["Adomicilio"],
                "Cambio de parilla": ["Adomicilio"],
                "Enderezado de puertas": ["Adomicilio"],
                "Pintura general": ["Adomicilio"],
                "Pulido de espejos y faros": ["Adomicilio"],
                "Cambio de faldones": ["Adomicilio"],
            },
            "Llanteria": {
                "Cambio de llanta": [""],
                "Relación de fuga de llanta ": [""],
                "Aliniado y balanceado": ["Adomicilio"],
                "Regulación de aire ": [""]
            },
            // Agrega más rubros y opciones aquí
        };

        // Captura los elementos select
        const rubroSelect = $('#rubro');
        const servicioSelect = $('#servicio');
        const tipoServicioSelect = $('#tipoServicio');

        // Maneja el cambio en el campo "Rubro"
        rubroSelect.on('change', function() {
            const rubroSeleccionado = rubroSelect.val();
            const serviciosPorRubro = opcionesDeshabilitadas[rubroSeleccionado];

            servicioSelect.html('<option disabled selected>Servicio que Ofrece...</option>');

            if (serviciosPorRubro) {
                // Agrega opciones para el servicio basado en el rubro seleccionado
                $.each(serviciosPorRubro, function(servicio, tipos) {
                    const option = $('<option>').val(servicio).text(servicio);
                    servicioSelect.append(option);
                });
            }
        });

        // Maneja el cambio en el campo "Servicio que Ofrece"
        servicioSelect.on('change', function() {
            const servicioSeleccionado = servicioSelect.val();
            const tiposDeshabilitar = opcionesDeshabilitadas[rubroSelect.val()][servicioSeleccionado];

            // Habilita todas las opciones primero
            tipoServicioSelect.find('option').removeAttr('disabled');

            if (tiposDeshabilitar) {
                // Deshabilita las opciones especificadas
                tiposDeshabilitar.forEach(function(tipo) {
                    tipoServicioSelect.find(`option[value='${tipo}']`).attr('disabled',
                        'disabled');
                });
            }
        });
    });
</script>
