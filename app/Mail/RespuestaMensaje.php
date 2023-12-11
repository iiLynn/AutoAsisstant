<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RespuestaMensaje extends Mailable
{
    use Queueable, SerializesModels;

    public $datos; // Datos que se pasarán a la vista del correo

    /**
     * Create a new message instance.
     *
     * @param array $datos
     * @return void
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.respuesta') // Nombre de la vista en resources/views/emails
            ->subject('¡Tu reporte ha sido recibido!'); // Asunto del correo basado en el formulario
    }
}
