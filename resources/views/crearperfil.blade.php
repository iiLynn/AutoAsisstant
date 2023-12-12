@extends('sitioweb')
@section('content')
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="card my-3">
                        <div class="text-start mx-3">
                            

                        <div class="text-center mt-2">
                            <div class="custom-upload">
                                <label for="logo">
                                    <div class="circle" style="border: 2px solid black">
                                        <img src="\imagenes\logo taller mecanico isaac.jpg" alt="Imagen del logo" />
                                    </div>
                                </label>
                                <input type="file" name="logo" id="logo" style="display: none;"
                                    value="" accept="image/*" class="form-control" readonly />

                        <br>
                        <div class="static-form">
    <div class="form-floating my-3">
        <div class="form-control">
            <label for="ntaller">Taller Flores</label>
        </div>
    </div>

    <div class="form-floating my-3">
        <div class="form-control">
            <label for="representante">Kerin Melendez</label>
            <x-input-error :messages="$errors->get('representante')" class="alert alert-danger" role="alert" />
            </button>
        </div>
    </div>

    <div class="form-floating my-3">
        <div class="form-control">
            <label for="numerocontacto">7342 6846</label>
            <x-input-error :messages="$errors->get('numerocontacto')" class="alert alert-danger" role="alert" />
        </div>
    </div>

    <div class="form-floating my-3">
        <div class="form-control">
            <label for="direccion">Usulután</label>
            <x-input-error :messages="$errors->get('direccion')" class="alert alert-danger" role="alert" />
        </div>
    </div>

    <div class="text-center">
    <a href="login" class="btn btn-dark" id="editarPerfil">
             Editar Perfil
             </a>


        </div>
    </div>
</div>



   
@endsection