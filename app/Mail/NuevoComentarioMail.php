<?php

namespace App\Mail;

use App\Models\Comentario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoComentarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $comentario;

    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    public function build()
    {
        return $this->subject('Nuevo Comentario en el Artículo')
                    ->view('emails.nuevo_comentario'); // Vista que mostraremos en el correo
    }
}
