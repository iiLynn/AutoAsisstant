<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoMensaje extends Mailable
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
        return $this->view('emails.contacto') // Nombre de la vista en resources/views/emails
            ->subject('¡Problemas en AutoAssistant!'); // Asunto del correo basado en el formulario
    }
}
