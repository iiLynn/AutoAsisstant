<style>
    /* Style the form */
    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    /* Style the input fields */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion de servicios') }}
        </h2>
    </x-slot>
    <br>
    <form action="{{ route('servicios-mecanicos.store') }}" method="POST" enctype="multipart/form-data" class="container"
        id="regForm">


        <h1>Inscripcion de Servicios</h1>

        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <br>
            <p> <select id="rubro" name="rubro" class="form-select"></p>
            <option disabled selected>Rubro...</option>
            <option value="Mecanico">Mecanico</option>
            <option value="Lubricentro">Lubricentro</option>
            <option value="Electronico">Electronico</option>
            <option value="Enderezado y Pintura">Enderezado y Pintura</option>
            <option value="General de Caja">General de Caja</option>
            <option value="Llanteria">Llanteria</option> </select></p>

            <p> <select id="servicio" name="servicio" class="form-select">
                    <option disabled selected>Servicio que Ofrece...</option>
                </select></p>

            <p>
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" aria-label="Descripcion"></textarea>
                <label for="descripcion">Descripcion del servicio</label>
            </p>
            <p> <select id="tipoServicio" name="tipoServicio" class="form-select">
                    <option disabled selected>Tipo Servicio...</option>
                    <option value="Adomicilio">Adomicilio</option>
                    <option value="Cita/Reserva">Cita en Taller</option>
                </select></p>
        </div>

        <div class="tab">
            <label for="fechaInicio">Horario de Inicio</label>
            <p> <select id="fechaInicio" name="fechaInicio" class="form-control select2">
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select></p>
            <p> <label for="fechaFin">Horario de Fin</label>
                <select id="fechaFin" name="fechaFin" class="form-control select2">
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>
            </p>

            <!-- Agregar estos campos de entrada de hora -->
            <p>
                <label for="hora1">Hora de Apertura:</label>
                <input type="text" class="form-control timepicker" id="hora1" name="hora1"
                    placeholder="Hora de Apertura" aria-label="Hora de Apertura">
            </p>

            <p>
                <label for="hora2">Hora de Cierre:</label>
                <input type="text" class="form-control timepicker" id="hora2" name="hora2"
                    placeholder="Hora de Cierre" aria-label="Hora de Cierre">
            </p>
            <p><label for="precio">Costo estimado</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio"
                    inputmode="numeric" pattern="[0-9\s]*" title="Ingresa un formato telefonico valido"
                    aria-label="precio">

            </p>
            <p><label for="precioes">Costo de envio</label>
                <input type="text" class="form-control" id="precioes" name="precioes" placeholder="precioes"
                    inputmode="numeric" pattern="[0-9\s]*" title="Ingresa un formato telefonico valido"
                    aria-label="precioes">

            </p>
        </div>

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Atrás</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>

            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>

        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/flatpickr.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.timepicker', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'h:i K',
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
</x-app-layout>
