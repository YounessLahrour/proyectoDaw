<?php

namespace App\Jobs;

use App\Mail\EmergencyCallReceived;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $email;
    //public $telefono;
    //public $audio;
    //public $lat;
    //public $lng;
    //protected $files;
    //protected $directorio;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nombre, $apellido)
    {
        //
        $this->nombre = $nombre;
        $this->apellido = $apellido;
       // $this->email=$email;
      //  $this->telefono = $datos->get('telefono');
        //$this->audio = $datos->get('audio');
        //$this->lat = $datos->get('lat');
        //$this->lng = $datos->get('lng');
        //$this->files = $datos;
      //  $this->directorio = $directorio;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $datos=$this->files;
        //dd("hola");
        $email= new EmergencyCallReceived($this->nombre, $this->apellido);
        Mail::to("yunimessilah@gmail.com")->send($email);
    }
}
