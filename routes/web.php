<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ServicioMecanicoController;
use App\Http\Controllers\ContratacionController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CulturaController;
use App\Models\Thesis;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\PerfilController; // Importa el controlador PerfilController
use App\Http\Controllers\UserController; // Importa el controlador UserController
use App\Http\Controllers\ServicioMecanico1Controller;
use App\Http\Controllers\PerfilmecanicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});



Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    // $user->token
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ],
    [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'email_verified_at' => now(), // establece la fecha de verificación del correo electrónico
    ]);

    // Verificar si falta el campo 'rol' en la tabla 'users'
    if (empty($user->rol)) {
        return view('auth.rol', ['user' => $user]);
    }


    Auth::login($user);
    if(Auth::check()){
        return redirect('/email/verify');
    }else{
        return back()->with('error', 'Hubo un error al autenticar al usuario. Por favor, inténtalo de nuevo.');
    }
    /*
    if($user->email_verified_at){
        return redirect('/welcome');
    }
    else{
        return redirect('/email/verify');
    }*/
});

Route::post('/user/insert-rol', [RolController::class, 'insertRol'])->name('user.insert-rol');


Route::get('/registro', function () {
    return view('registerA');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contactos', function () {
    return view('contactos');
});

Route::get('/opciones', function () {
    return view('opciones');
});

Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/perfilusu', function () {
    return view('perfilusu');
});

Route::get('/funciones', function () {
    return view('funciones');
});
Route::get('/lol', function () {
    return view('lol');
});
Route::get('/otraVista', function () {
    return view('serviciosMecanicos.otraVista');
});
Route::get('/detalles-info', function () {
    return view('publicaciones.info');
});
Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/infoServicioWeb', function () {
    return view('serviciosMecanicos.infoServicioWeb');
});
Route::get('/opcionesRegistro', function () {
    return view('mario');
})->name('opcionesRegistro');

Route::get('/inicio', function() {
    return view('inicio');
  })->name('inicio');

  Route::get('/ServiciosSitio', function () {
    return view('serviciosMecanicos.ServiciosSitio');
});
Route::get('/servicios', function() {
    return view('ServiciosSitio');
  })->name('servicios');

  Route::get('/asesoria', function () {
    return view('serviciosMecanicos.asesoria');
});
Route::get('/thesis', function () {
    $theses = Thesis::all();
    return view('serviciosMecanicos.thesis')->with('theses',$theses);
});
Route::get('/inscripcion1', function () {
    return view('inser.index');
});
Route::get('/ruta_personalizada', function () {
    // Lógica de tu vista "inscripcion1" o redirección a ella.
})->name('serviciosMecanicos.inscripcion1');

/*Inscripcion de servicios mecanicos
Route::get('/requisitos', function () {
    return view('serviciosMecanicos.requisitos');
});*/

/*Route::get('/inscripcion', function () {
    return view('serviciosMecanicos.inscripcion');
});*/

Route::get('/serviciosMecanicos', function () {
    return view('serviciosMecanicos.servicioM');
});

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::get('/perfil', function () {
    return view('perfil.index');
});


//Rutas para pilotos
Route::get('/publicacion', [PublicacionController::class, 'index'])->name('publicaciones.index');
Route::get('/publicaciones/create', [PublicacionController::class, 'create'])->name('publicaciones.create');
Route::post('/publicaciones', [PublicacionController::class, 'store'])->name('publicaciones.store');
Route::get('/publicaciones/buscar', [PublicacionController::class, 'buscar'])->name('publicaciones.buscar');
Route::get('/publicaciones/{publicacion}',[PublicacionController::class, 'show'])->name('publicaciones.show');

//Rutas para servicios mecanicos
Route::get('/servicios-mecanicos', [ServicioMecanicoController::class, 'index'])->name('servicios-mecanicos.index');
Route::get('/servicios-mecanicos/create', [ServicioMecanicoController::class, 'create'])->name('servicios-mecanicos.create');
Route::post('/servicios-mecanicos', [ServicioMecanicoController::class, 'store'])->name('servicios-mecanicos.store');
Route::post('/servicios-mecanicos/buscar', [ServicioMecanicoController::class, 'buscarServicio'])->name('servicios-mecanicos.buscar');
Route::get('/servicios-mecanicos/{id}', [ServicioMecanicoController::class, 'show'])->name('servicios-mecanicos.show');
Route::get('/servicios-mecanicos/{servicio}/edit', [ServicioMecanicoController::class, 'edit'])->name('servicios-mecanicos.edit');
Route::delete('/servicios-mecanicos/{servicio}', [ServicioMecanicoController::class, 'destroy'])->name('servicios-mecanicos.destroy');
Route::put('/servicios-mecanicos/{id}', [ServicioMecanicoController::class, 'update'])->name('servicios-mecanicos.update');

//rutas prueba
Route::get('/inser/index', [ServicioMecanico1Controller::class, 'create'])->name('inser.index');
Route::post('/inser/index', [ServicioMecanico1Controller::class, 'store'])->name('inser.store');
Route::post('/inser/index/buscar', [ServicioMecanico1Controller::class, 'buscarServicio'])->name('inser.buscar');
Route::post('/inser/index/{id}', [ServicioMecanico1Controller::class, 'show'])->name('inser.show');
Route::post('/inser/index/{servicio}/edit', [ServicioMecanico1Controller::class, 'edit'])->name('inser.edit');
Route::post('/inser/index/{servicio}', [ServicioMecanico1Controller::class, 'destroy'])->name('inser.index');
Route::post('/inser/index/{id}', [ServicioMecanico1Controller::class, 'update'])->name('inser.index');
Route::get('/inser/index', [ServicioMecanico1Controller::class, 'create'])->name('inser.index');
Route::get('inser/index/{servicio}', 'AlgunController@index')->name('inser.index');





//rutas para pilotos
Route::get('/otra-vista', [PublicacionController::class, 'otraVista'])->name('publicaciones.otravista');
Route::get('/otra-vista/buscar', [PublicacionController::class, 'buscar'])->name('publicaciones.busscar');

//rutas para cultura
Route::get('/cultura-s/create', [CulturaController::class, 'create'])->name('cultura.index1');
Route::get('/cultura.store', [CulturaController::class, ' store'])->name('cultura.index1');
//rutas para ver mas
Route::get('/info/{publicacion}',[PublicacionController::class, 'show'])->name('publicaciones.show1');

//ruta para servicioWeb
Route::get('/servicios-internos', [ServicioMecanicoController::class, 'indexInterno'])->name('servicios-mecanicos.indexinterno');
Route::get('/servicios-externos', 'ServicioMecanicoController@indexExterno');
Route::get('/servicios-interno/{id}', [ServicioMecanicoController::class, 'show'])->name('servicios-mecanicos.show1');

//Rutas para contrataciones
Route::get('/contrataciones', [ContratacionController::class, 'index'])->name('contrataciones.index');
Route::get('/servicios-mecanicos/{id}/contrataciones', [ContratacionController::class, 'create'])->name('contrataciones.create');
Route::post('/servicios-mecanicos/{id}/contrataciones', [ContratacionController::class, 'store'])->name('contrataciones.store');
Route::post('/contrataciones/buscar', [ContratacionController::class, 'buscarServicio'])->name('contrataciones.buscar');
Route::get('/contrataciones/{id}', [ContratacionController::class, 'show'])->name('contrataciones.show');
Route::get('/contrataciones/{id}/edit', [ContratacionController::class, 'edit'])->name('contrataciones.edit');
Route::delete('/contrataciones/{id}', [ContratacionController::class, 'destroy'])->name('contrataciones.destroy');
Route::put('/contrataciones/{id}', [ContratacionController::class, 'update'])->name('contrataciones.update');

//Rutas para mensajeria
Route::get('/mensajeria/{servicioId}', [MensajeController::class, 'index'])->name('mensajeria.index');
//Rutas prueba

Route::get('/perfilusu', 'TuControlador@mostrarFormulario')->name('mostrarFormulario');
Route::get('/perfilusu', [TuController::class, 'show'])->name('perfilusu1');
Route::post('/guardar-datos', 'TuControlador@guardarDatos')->name('guardarDatos');

//rutas manueles


Route::get('/manuales', [ThesisController::class, 'index'])->name('manuales.index');
Route::post('/thesis/register', [ThesisController::class, 'store'])->name('thesis_register');
Route::get('/thesis/file/{id}', [ThesisController::class, 'urlfile'])->name('thesis_file');
Route::post('/thesis/update', [ThesisController::class, 'update'])->name('thesis_update');
Route::get('/thesis/delete/{id}', [ThesisController::class, 'destroy'])->name('thesis_delete');

//rutas perfil
Route::get('/perfil/index', [PerfilController::class, 'create'])->name('perfil.index');
Route::get('/perfil/validacion', [PerfilController::class, 'validarperfil'])->name('perfil.validarperfil');
Route::post('/perfil/store', [PerfilController::class, 'store'])->name('perfil.store');
//rutas vista de perfil mecanico

Route::get('/perfilmecanico/index', [PerfilmecanicoController::class, 'create'])->name('perfilmecanico.index');
Route::get('/perfilmecanico/validacion', [PerfilmecanicoController::class, 'validarperfil'])->name('perfilmecanico.validarperfil');
Route::post('/perfilmecanico/store', [PerfilmecanicoController::class, 'store'])->name('perfilmecanico.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';