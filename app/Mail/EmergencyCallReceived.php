<?php

namespace App\Mail;

use App\Cliente;
use App\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $ordene;
    public $cliente;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orden $ordene)
    {
        //
        $this->ordene=$ordene;
        $this->cliente=Cliente::find($ordene->cliente_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.emergency_call')->subject('Notificación de YuniTic');
    }
}
