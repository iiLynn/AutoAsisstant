<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Mecánico') }}
        </h2>
    </x-slot>
    <br>
    <br>
    <div class="container mt-5">
        <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="my-custom-form">
            @csrf


            <style>
                * {
                    box-sizing: border-box;
                }

                form {
                    width: 500px;
                    padding: 26px;
                    border-radius: 10px;
                    margin: auto;
                    background-color: #ccc;
                }

                form label {

                    font-weight: bold;
                    display: inline-block;
                }

                form input[type="text"],
                form input[type="email"] {
                    width: 400px;
                    padding: 3px 10px;
                    border: 1px solid #f6f6f6;
                    border-radius: 3px;
                    background-color: #f6f6f6;
                    margin: 8px 0;
                    display: inline-block;
                }

                form input[type="submit"] {
                    width: 100%;
                    padding: 8px 16px;
                    margin-top: 32px;
                    border: 1px solid #000;
                    border-radius: 5px;
                    display: block;
                    color: #fff;
                    background-color: #000;
                }

                form input[type="submit"]:hover {
                    cursor: pointer;
                }

                textarea {
                    width: 100%;
                    height: 100px;
                    border: 1px solid #f6f6f6;
                    border-radius: 3px;
                    background-color: #f6f6f6;
                    margin: 8px 0;
                    /*resize: vertical | horizontal | none | both*/
                    resize: none;
                    display: block;
                }

                .centered {
                    text-align: center;
                    /* Centra el contenido horizontalmente */
                    margin: 0 auto;
                    /* Centra el contenido horizontalmente en el centro de la página */
                    display: block;
                    /* Para que el margen automático funcione correctamente */
                }

                .custom-upload {
                    text-align: center;
                }

                .circle {
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    background-color: #e0e0e0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                }

                .circle img {
                    max-width: 80px;
                    max-height: 80px;
                }

                input[type="file"] {
                    display: none;
                }

                .back-button {
                    margin: 8px 0;
                    width: 100px;
                    /* Ajusta el ancho según tus preferencias */
                    padding: 8px 16px;
                    border: 1px solid #000;
                    border-radius: 5px;
                    color: #000;
                    background-color: #fff;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                }

                /* Estilos para el contenedor del logo y el botón de regresar */
                .logo-and-button-container {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
            </style>

            </head>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="#" target="" method="get" name="formDatosPersonales">
                <a href="{{ route('welcome') }}" class="back-button">Regresar</a>

                <div class="centered logo-container">
                    <div class="custom-upload">
                        <label for="logo">
                            <div class="circle">
                                <img src="ruta_de_la_imagen.jpg" alt="Imagen del logo" />
                            </div>
                        </label>
                        <input type="file" name="logo" id="logo" style="display: none;" />
                    </div>
                </div>

                <br>
                <br>
                <br>
                <label for="ntaller">Nombre de taller</label>
                <input type="text" name="ntaller" id="ntaller" placeholder="Nombre de taller">
                <br>
                <label for="servicios">Nombre de propietario</label>
                <input type="text" name="servicios" id="servicios" placeholder="Servicios"
                    value="{{ auth()->user()->name }}" />
                <br>
                <label for="numerocontacto">Número</label>
                <input type="text" name="numerocontacto" id="numerocontacto" placeholder="Número de contacto">
                <br>
                <div class="social-icons">
                    <a href="enlace_de_facebook" target="_blank">
                        <img src="icono_facebook.png" alt="Facebook" width="32" height="32">
                    </a>
                    <a href="enlace_de_instagram" target="_blank">
                        <img src="icono_instagram.png" alt="Instagram" width="32" height="32">
                    </a>
                </div>

                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" placeholder="Dirección">
                <br>


                <input type="submit" name="enviar" value="GUARDAR DATOS" />
            </form>
</x-app-layout>
