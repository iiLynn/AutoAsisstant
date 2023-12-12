@extends('sitioweb')

@section('content')
    <div class="container py-3">


        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Soporte técnico de AutoAssistant</h5>
                <br>
                <br>
                <div
                    style="width: 300px; height: 300px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto;">
                    <img src="\imagenes\pngwing.com.png" alt="Imagen de soporte" style="max-width: 80%; max-height: 80%;">
                </div>
                <br>
                <br>
                <br>
                <div class="d-flex justify-content-between mt-3">
                    <div style="flex: 1; text-align: center;">
                        <div style="flex: 1; text-align: center;">
                            <div
                                style="width: 100px; height: 100px; background-color: #f0f0f0; border-radius: 5px; margin: 0 auto 5px;">

                                <img src="\imagenes\logomail.jpg" alt="Imagen de soporte"
                                    style="max-width: 100%; max-height: 100%;">
                            </div>
                            <p>AutoAssitant@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('mensaje'))
                <p class="alert alert-success" role="alert">{{ session('mensaje') }}</p>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('soporte.contacto.enviar') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input class="form-control" type="text" name="nombre" id="nombre"
                                pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+" title="Solo letras permitidas" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo_usuario" class="form-label">Correo Electrónico:</label>
                            <input class="form-control" type="email" name="correo_usuario" id="correo_usuario"
                                aria-describedby="emailHelp" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                                title="Formato de correo no válido" required>
                            <div id="emailHelp" class="form-text">Correo electronico al que quieras recibir una respuesta.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto:</label>
                            <input class="form-control" type="text" name="asunto" id="asunto"
                                pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+" title="Solo letras permitidas" required
                                aria-describedby="asuntoHelp">
                            <div id="asuntiHelp" class="form-text">Titulo breve sobre tu problematica.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje:</label>
                            <textarea class="form-control" name="mensaje" id="mensaje" rows="4" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"
                                title="Solo letras permitidas" aria-describedby="mesajeHelp" required></textarea>
                            <div id="mesajeHelp" class="form-text">Describe el problema que presentas.
                            </div>
                        </div>


                        <button class="btn btn-primary" type="submit">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
            <div style="width: 100px; height: 100px; background-color: #f0f0f0; border-radius: 5px; margin: 0 auto 5px;">
                <img src="\imagenes\telefono.jpg" alt="Imagen de soporte" style="max-width: 100%; max-height: 100%;">
            </div>
            <p style="text-align: center;">2628-1630</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div
                style="width: 100px; height: 100px; background-color: #f0f0f0; border-radius: 5px; margin: 0 auto 5px; display: flex; justify-content: center; align-items: center;">
                <img src="\imagenes\QR.jpg" alt="Imagen de soporte"
                    style="max-width: 300%; max-height: 300%; object-fit: contain;">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
@endsection
