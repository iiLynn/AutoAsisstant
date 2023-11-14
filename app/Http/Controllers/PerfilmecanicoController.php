<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\perfil;
use App\Models\ServicioMecanico;

class PerfilmecanicoController extends Controller
{
    public function create()
    {

        return view('perfilmecanico.perfil');
    }

    public function validarperfil()
    {
        // Obtiene el usuario autenticado
        $userid = Auth::id();
        $perfil = perfil::where('id_user', $userid)->first();

        if ($perfil) {
            return redirect()->route('servicios-mecanicos.create');
        } else {
            return redirect()->route('perfil.index')->with('error', 'Actualmente no tiene un perfil creado, Crealo pendjo ');
        }

    }
    public function store(Request $request)
    {
        try {
            $userid = Auth::id();

            // Valida los datos
            $validator = Validator::make($request->all(), [
                'numerocontacto' => 'nullable',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'ntaller' => 'nullable',
                'representante' => 'required',
                'direccion' => 'nullable',

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $logo = $request->file('logo');
            $logo_path = null;
            if ($logo) {
                $logo_path = 'imagenes/' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('imagenes/'), $logo_path);
            }


            $perfil = new perfil();
            $perfil->numerocontacto = $request->input('numerocontacto');
            $perfil->ntaller = $request->input('ntaller');
            $perfil->representante = $request->input('representante');
            $perfil->direccion = $request->input('direccion');
            $perfil->logo = $logo_path;
            $perfil->id_user = $userid;

            $perfil->save();

            return redirect()->route('servicios-mecanicos.create')->with('success', 'Perfil actualizado exitosamente.');
        } catch (QueryException $e) {
            Session::flash('error', 'Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back();
        }
    }
    public function showProfile($id)
    {
        try {
            $perfil = Perfil::findOrFail($id);
            $idPerfil = $perfil->id;

            $serviciosPerfil = ServicioMecanico::where('id_perfil', $idPerfil)->get();

            return view('perfilmecanico.perfil', compact('perfil', 'serviciosPerfil'));
        } catch (\Exception $e) {
            // Manejar el error, por ejemplo redirigir a una página de error o mostrar un mensaje amigable.
            return redirect()->route('error')->with('error', 'Perfil no encontrado');
        }
    }


}