<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tu reporte "{{ $datos['asunto'] }}" ha sido recibido</h2>

                <div class="card-text">
                    <p>¡Gracias por tu reporte! </p>
                    <p>
                        Hola! <strong>{{ $datos['nombre'] }}</strong> <br>

                        Gracias por comunicarte con el soporte tecnico de AutoAssitant, hemos recibido tu reporte y
                        trabajaremos para resolverlo lo más rápido
                        posible. Te notificaremos por correo electrónico una vez que haya novedades. ¡Apreciamos tu
                        paciencia!
                    </p>
                    <p><strong>Asunto: </strong> {{ $datos['asunto'] }}</p>
                    <p><strong>Mensaje:</strong> {{ $datos['mensaje'] }}</p>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
