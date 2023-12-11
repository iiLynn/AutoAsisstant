@extends('sitioweb')

@section('content')
    <div class="container py-3">


        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Soporte tecnico de AutoAssistant</h5>
                <h6 class="card-subtitle text-body-secondary">Envianos un reporte con cualquier inconveniente que
                    presentes.
                </h6>
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

    </div>
@endsection
