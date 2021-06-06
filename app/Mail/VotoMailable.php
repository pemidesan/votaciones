<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Encuesta;

class VotoMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    
    public $direccion;
    public $encuesta_id;
    public $pregunta;

    public function __construct($direccion,$encuesta_id,$pregunta)
    {
        $this->direccion = $direccion;
        $this->encuesta_id = $encuesta_id;
        $this->pregunta = $pregunta;

        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.votoEnviado');
    }
}
