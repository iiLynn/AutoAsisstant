<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\perfil;
use Illuminate\Validation\Rule;


class PerfilController extends Controller
{
    public function index()
    {

        return view('perfil.index');
    }



    public function validarperfil()
    {
        // Obtiene el usuario autenticado
        $userid = Auth::id();
        $perfil = perfil::where('id_user', $userid)->first();

        if ($perfil) {
            return redirect()->route('servicios-mecanicos.create');
        } else {
            return redirect()->route('perfil.index')->with('error', 'Actualmente no tiene un perfil creado.');
        }

    }
    public function validarperfil2()
    {
        // Obtiene el usuario autenticado
        $userid = Auth::id();
        $perfil = perfil::where('id_user', $userid)->first();

        if ($perfil) {
            return redirect()->route('perfil.showOrEdit');
        } else {
            return redirect()->route('perfil.index')->with('error', 'Actualmente no tiene un perfil creado.');
        }

    }
    public function store(Request $request)
    {
        try {
            $userid = Auth::id();

            // Valida los datos
            $validator = Validator::make($request->all(), [
                'numerocontacto' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'ntaller' => [
                    'required',
                    Rule::unique('perfil'),
                ],
                'representante' => 'required',
                'direccion' => 'required',

            ], [
                'required' => 'El campo es obligatorio.',
                'ntaller.unique' => 'Ya existe un taller con el mismo nombre.',
                'logo.image' => 'El archivo debe ser una imagen válida (jpeg, png, jpg, gif).',
            'logo.max' => 'El tamaño de la imagen no debe ser mayor a 2048 kilobytes.',
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
    public function showProfile()
    {

        $userid = Auth::id();
        $perfil = perfil::where('id_user', $userid)->first();

        if ($perfil) {
            return view('perfil.editPerfil', compact('perfil'));
        } else {
            return redirect()->route('perfil.index')->with('error', 'Actualmente no tiene un perfil creado. ');
        }

    }

    public function updatePerfil(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'numerocontacto' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ntaller' => 'required|unique:perfil,ntaller,' . $id, // Agregamos la regla unique
            'representante' => 'required',
            'direccion' => 'required',
        ], [
            'required' => 'El campo es obligatorio.',
            'image' => 'El archivo seleccionado no es una imagen válida.',
            'max' => 'El tamaño de la imagen no puede ser mayor a :max kilobytes.',
             'ntaller.unique' => 'El nombre del taller ya está en uso.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $perfil = perfil::find($id);
        $perfil->numerocontacto = $request->input('numerocontacto');
        $perfil->ntaller = $request->input('ntaller');
        $perfil->representante = $request->input('representante');
        $perfil->direccion = $request->input('direccion');

        // Verificar si se ha cargado un nuevo archivo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_path = 'imagenes/' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('imagenes/'), $logo_path);
            $perfil->logo = $logo_path;
        }

        //dd($perfil);

        $perfil->save();

        return redirect()->route('perfil.showOrEdit')->with('success', 'Los datos se han actualizado.');
    }


}