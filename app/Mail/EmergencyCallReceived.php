<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre;
    public $apellido;
    public $telefono;
    public $audio;
    public $lat;
    public $lng;
    public $files;
    public $directorio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos, $directorio)
    {
        
        $this->nombre = $datos->get('nombre');
        $this->apellido = $datos->get('apellido');
        $this->telefono = $datos->get('telefono');
        $this->audio = $datos->get('audio');
        $this->lat = $datos->get('lat');
        $this->lng = $datos->get('lng');
        $this->files = $datos;
        $this->directorio = $directorio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('mails.emergency_call')->from('prontogestion@gmail.es', ucfirst($this->nombre) . " " . ucfirst($this->apellido))->subject("Pronto Gestión");
       
        if (isset($this->audio)) {
            $email->attach(public_path($this->audio), [
                'as' => 'audio'.ucfirst($this->nombre).'.webm',
                'mime' => 'application/mp3',
            ]);
        }
        
        $directorio = $this->directorio;
        if($directorio!="vacio"){
            $email->attach($directorio, [
            'mime' => 'application/pdf',
        ]);
        }

        return $email;
    }
}
