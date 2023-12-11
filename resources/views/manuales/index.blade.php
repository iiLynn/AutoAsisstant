<x-app-layout>
    <style>
        .container {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            color: #ffffff;
        }

        .table th,
        .table td {
            border: 1px solid #fafafa;
            padding: 10px;
        }

        .table th {
            background-color: #000000;
            font-weight: bold;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .modal {
            max-width: 600px;
        }

        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-bottom: 10px;
            margin-top: 10px;
            max-width: 700px;
            text-align: center;
        }

        .search-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .search-button {
            background-color: #f00a62;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            margin-left: 5px;
        }

        .background-image {
            background-image: url('/imagenes/fondo4.jpg');
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
        }

        .container {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            color: #ffffff;
        }

        .table th,
        .table td {
            border: 1px solid #000000;
            padding: 10px;
        }

        .table th {
            background-color: #000000;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
        }

        .table td {
            text-align: center;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('manuales de taller y propietario') }}
        </h2>
    </x-slot>

    <body>



        <div class="container">
            <br>

            <div class="container table mt-4">
                <div id="buscarForm" class="search-form">
                    <input type="text" name="search" id="search" class="search-input"
                        placeholder="Buscar por marca..." onkeyup="buscarServicios()">
                    <button type="button" onclick="limpiarBusqueda()" class="search-button">Limpiar</button>
                </div>
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ARCHIVO</th>
                            <th scope="col">MARCA</th>
                            <th scope="col">MODELO</th>
                            <th scope="col">AÑO</th>
                            <th scope="col">TIPO DE MANUAL</th>
                            <th scope="col">ESTADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manuales as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td width="10%">
                                    <button type="button" class="btn btn-info"
                                        onclick="showFile('{{ $item->id }}')">Ver</button>
                                    <button type="button" class="btn btn-success"
                                        onclick="modalEdit('{{ $item->id }}','{{ $item->title }}','{{ $item->state }}','{{ $item->thesis_code }}')"
                                        data-toggle="modal" data-target="#exampleModalEdit">Editar</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="deleteThesis('{{ $item->id }}')">Eliminar</button>
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->title2 }}</td>
                                <td>{{ $item->title3 }}</td>
                                <td>{{ $item->title4 }}</td>
                                <td>
                                    @if ($item->state == 1)
                                        Disponible
                                    @elseif ($item->state == 0)
                                        No disponible
                                    @else
                                        {{ $item->state }}
                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Modal -->
                <form enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Tesis</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">MARCA</label>
                                    <input type="text" class="form-control" id="title" name="title">

                                </div>
                                <div class="form-group">
                                    <label for="title2">MODELO</label>
                                    <input type="text" class="form-control" id="title2" name="title2">

                                </div>
                                <div class="form-group">
                                    <label for="title3">ANO</label>
                                    <input type="text" class="form-control" id="title3" name="title3">

                                </div>
                                <div class="form-group">
                                    <label for="title4">TIPO DE MANUAL</label>
                                    <input type="text" class="form-control" id="title4" name="title4">

                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Archivo</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                        name="file">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" value="1" checked class="form-check-input"
                                        id="exampleCheck1" name="state">
                                    <label class="form-check-label" for="exampleCheck1">Activo</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="btn-register">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form enctype="multipart/form-data" class="modal fade" id="exampleModalEdit" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Tesis</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Titulo</label>
                                    <input type="text" class="form-control" id="title-edit" name="title">
                                    <input type="hidden" id="thesis_id" name="thesis_id">
                                    <input type="hidden" id="thesis_code" name="thesis_code">
                                </div>
                                <div class="form-group">
                                    <label for="title2">Titulo</label>
                                    <input type="text" class="form-control" id="title2-edit" name="title2">
                                    <input type="hidden" id="thesis_id" name="thesis_id">
                                    <input type="hidden" id="thesis_code" name="thesis_code">
                                </div>
                                <div class="form-group">
                                    <label for="title3">ANO</label>
                                    <input type="text" class="form-control" id="title3-edit" name="title3">
                                    <input type="hidden" id="thesis_id" name="thesis_id">
                                    <input type="hidden" id="thesis_code" name="thesis_code">
                                </div>
                                <div class="form-group">
                                    <label for="title4">TIPOS DE MANUAL</label>
                                    <input type="text" class="form-control" id="title4-edit" name="title4">
                                    <input type="hidden" id="thesis_id" name="thesis_id">
                                    <input type="hidden" id="thesis_code" name="thesis_code">
                                </div>
                                <div class="form-group">
                                    <label for="file-edit">Archivo</label>
                                    <input type="file" class="form-control-file" id="file-edit" name="file">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" value="1" checked class="form-check-input"
                                        id="state-edit" name="state">
                                    <label class="form-check-label" for="state-edit">Activo</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="btn-update">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function modalEdit(id, tit, est, cod) {
            $('#title-edit').val(tit);
            $('#title2-edit').val(tit);
            $('#title3-edit').val(tit);
            $('#title4-edit').val(tit);
            $('#state-edit').val(est);
            $('#thesis_id').val(id);
            $('#thesis_code').val(cod);
        }
    </script>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $("#btn-register").click(function() {
            var formData = new FormData(document.getElementById("exampleModal"));
            $.ajax({
                url: "{{ route('thesis_register') }}",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res) {
                msg = JSON.parse(res).response.msg
                alert(msg);
                location.reload();
            }).fail(function(res) {
                console.log(res)
            });
        });

        function showFile(id) {
            $.ajax({
                url: "{{ asset('/thesis/file/') }}/" + id,
                type: "get",
                dataType: "html",
                contentType: false,
                processData: false
            }).done(function(res) {
                url = JSON.parse(res).response.url
                window.open('storage/' + url, '_blank');
            }).fail(function(res) {
                console.log(res)
            });
        }
        $("#btn-update").click(function() {
            var formData = new FormData(document.getElementById("exampleModalEdit"));
            $.ajax({
                url: "{{ route('thesis_update') }}",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res) {
                msg = JSON.parse(res).response.msg
                alert(msg);
                location.reload();
            }).fail(function(res) {
                console.log(res)
            });
        });

        function deleteThesis(id) {
            $.ajax({
                url: "{{ asset('/thesis/delete/') }}/" + id,
                type: "get",
                dataType: "html",
                contentType: false,
                processData: false
            }).done(function(res) {
                msg = JSON.parse(res).response.msg
                alert(msg);
                location.reload();
            }).fail(function(res) {
                console.log(res)
            });
        }
    </script>
    <script>
        function buscarServicios() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementsByTagName("table")[0];
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                var found = false;
                for (var j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function limpiarBusqueda() {
            document.getElementById("search").value = "";
            var table = document.getElementsByTagName("table")[0];
            var tr = table.getElementsByTagName("tr");
            for (var i = 0; i < tr.length; i++) {
                tr[i].style.display = "";
            }
        }
    </script>
</x-app-layout>
