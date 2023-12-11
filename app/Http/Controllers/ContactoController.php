<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactoMensaje;
use App\Mail\RespuestaMensaje;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function mostrarFormulario()
    {
        $usuarioAutenticado = Auth::user();

        return view('soporte.formulario_contacto', ['usuarioAutenticado' => $usuarioAutenticado]);
    }

    public function enviarMensaje(Request $request)
    {

        $datos = [
            'nombre' => $request->input('nombre'),
            'correo_usuario' => $request->input('correo_usuario'),
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
        ];

        $destinatarioSoporte = Config::get('mail.soporte.address');


        if (!$destinatarioSoporte) {
            return redirect()->route('formulario.contacto')->with('mensaje', 'Error: El destinatario de soporte no está configurado.');
        }

        $correoUsuario = $request->input('correo_usuario');

        if (!$correoUsuario) {
            return redirect()->route('formulario.contacto')->with('mensaje', 'Error: Debes proporcionar tu correo electrónico.');
        }


        $correoSoporte = new ContactoMensaje($datos);
        Mail::to($destinatarioSoporte)->send($correoSoporte);


        $correoRespuesta = new RespuestaMensaje($datos);
        Mail::to($correoUsuario)->send($correoRespuesta);

        return redirect()->route('formulario.contacto')->with('mensaje', 'Reporte enviado con éxito. Se te enviará una respuesta a tu correo electrónico.');
    }


    public function mostrarFormularioWeb()
    {
        return view('Soporte.soporteWeb');
    }

    public function enviarMensajeWeb(Request $request)
    {

        $datos = [
            'nombre' => $request->input('nombre'),
            'correo_usuario' => $request->input('correo_usuario'),
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
        ];


        $destinatarioSoporte = Config::get('mail.soporte.address');

        if (!$destinatarioSoporte) {
            return redirect()->route('soporte.contacto')->with('mensaje', 'Error: El destinatario de soporte no está configurado.');
        }

        $correoUsuario = $request->input('correo_usuario');

        if (!$correoUsuario) {
            return redirect()->route('soporte.contacto')->with('mensaje', 'Error: Debes proporcionar tu correo electrónico.');
        }


        $correoSoporte = new ContactoMensaje($datos);
        Mail::to($destinatarioSoporte)->send($correoSoporte);


        $correoRespuesta = new RespuestaMensaje($datos);
        Mail::to($correoUsuario)->send($correoRespuesta);

        return redirect()->route('soporte.contacto')->with('mensaje', 'Reporte enviado con éxito. Se te enviará una respuesta a tu correo electrónico.');
    }
}
