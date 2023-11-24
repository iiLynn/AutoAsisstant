<x-app-layout>

    <style scoped>
        .circle {
            width: 150px;
            /* Ajusta el tamaño según tus necesidades */
            height: 150px;
            /* Ajusta el tamaño según tus necesidades */
            overflow: hidden;
            border-radius: 50%;
        }

        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ajusta la propiedad object-fit según tus necesidades (cover, contain, etc.) */
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil Mecánico') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <form action="{{ route('perfil.edit', $perfil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card my-3">
                        <div class="text-start mx-3">
                            <a href="{{ route('welcome') }}" class="btn btn-dark my-3">Regresar</a>
                        </div>


                        <div class="text-center mt-2">
                            <div class="custom-upload">
                                <label for="logo">
                                    <div class="circle" style="border: 2px solid black">
                                        <img src="{{ asset($perfil->logo) }}" alt="Imagen del logo" />
                                    </div>
                                </label>
                                <input type="file" name="logo" id="logo" style="display: none;"
                                    accept="image/*" class="form-control" readonly />
                            </div>
                            <x-input-error :messages="$errors->get('logo')" class="alert alert-danger" role="alert" />
                        </div>

                        <br>
                        <div class="card-body">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="ntaller" name="ntaller"
                                    placeholder="Nombre del taller" aria-label="ntaller" value="{{ $perfil->ntaller }}"
                                    readonly>
                                <label for="ntaller">Nombre de taller</label>
                                <x-input-error :messages="$errors->get('ntaller')" class="alert alert-danger" role="alert" />
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="representante" name="representante"
                                    placeholder="Nombre del propietario" aria-label="representante"
                                    value="{{ $perfil->representante }}" readonly>
                                <label for="representante">Nombre del propietario</label>
                                <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert" />
                                <button type="button" id="setOwnerName" class="btn btn-dark mt-2">
                                    Establecer nombre de la cuenta
                                </button>
                            </div>

                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="numerocontacto" name="numerocontacto"
                                    placeholder="Numero" aria-label="numerocontacto"
                                    value="{{ $perfil->numerocontacto }}" readonly>
                                <label for="numerocontacto">Numero</label>
                                <x-input-error :messages="$errors->get('numerocontacto')" class="alert alert-danger" role="alert" />
                            </div>

                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Direccion" aria-label="direccion" value="{{ $perfil->direccion }}"
                                    readonly>
                                <label for="direccion">Direccion</label>
                                <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert" />
                            </div>

                            <div class="text-center">
                                <div class="btn btn-dark" id="editarPerfil">
                                    Editar Perfil
                                </div>

                                <button class="btn btn-dark" type="submit" id="GuardarCambios"
                                    style="display: none;">Guardar Cambios</button>
                                <div id="cancelarEdicion" class="btn btn-secondary mt-2" style="display: none;">
                                    Cancelar
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.querySelector('.circle img');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src =
                    "ruta_de_la_imagen.jpg"; // Ruta de la imagen predeterminada si no se selecciona ninguna imagen
            }
        }

        document.getElementById('logo').addEventListener('change', function() {
            previewImage(this);
        });

        document.getElementById('setOwnerName').addEventListener('click', function() {
            document.getElementById('representante').value = "{{ auth()->user()->name }}";
        });




        function toggleEdicion() {
            // Obtén todos los campos que deben ser editables
            var editableFields = document.querySelectorAll('.form-control[readonly]');

            // Itera sobre los campos y cambia el atributo readonly
            editableFields.forEach(function(field) {
                field.readOnly = !field.readOnly;
            });


            // Muestra u oculta los botones según sea necesario
            document.getElementById('cancelarEdicion').style.display =
                document.getElementById('cancelarEdicion').style.display === 'none' ? 'inline-block' : 'none';

            document.getElementById('editarPerfil').style.display =
                document.getElementById('editarPerfil').style.display === 'none' ? 'inline-block' : 'none';

            // Agregamos la lógica para el botón 'GuardarCambios'
            document.getElementById('GuardarCambios').style.display =
                document.getElementById('GuardarCambios').style.display === 'none' ? 'inline-block' : 'none';
        }

        document.getElementById('editarPerfil').addEventListener('click', toggleEdicion);

        document.getElementById('cancelarEdicion').addEventListener('click', function() {
            // Llama a la misma función para revertir los cambios al presionar "Cancelar"
            toggleEdicion();
        });
    </script>
</x-app-layout>
