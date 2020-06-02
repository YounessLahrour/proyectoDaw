<?php

namespace App\Mail;

use App\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionClientes extends Mailable
{
    use Queueable, SerializesModels;
    public $cliente;
    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente, $mensaje)
    {
        //
        $this->cliente=$cliente;
        $this->mensaje=$mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notificar')->subject('Ofertas de YuniTic');
    }
}
