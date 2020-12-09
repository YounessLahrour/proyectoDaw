<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Mail\EmergencyCallReceived;
use File;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Models\Enviar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnviarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $nombre = $request->get('nombre');
        $apellido = $request->get('apellido');
        $telefono = $request->get('telefono');
        $files = $request->get('file');

        if ($files != "") {
            foreach ($files as $file) {

                //creo un nombre
                $nombre1 = 'img/' . time() . ' ' . $file->getClientOriginalName();
                //guardo ek archivo imagen
                Storage::disk('public')->put($nombre1, \File::get($file));
            }
        }


        //$myEmail = 'yunimessilah@gmail.com';
        //Mail::to($myEmail)->send(new EmergencyCallReceived());
        dd("Mail Send Successfully");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre =  ucfirst(trim($request->get('nombre')));
        $apellido = ucfirst(trim($request->get('apellido')));
        $telefono = $request->get('telefono');
        $audio = $request->get('audio');
        $lat=$request->get('lat');
        $lng=$request->get('lng');
        // $file = $request->get('file');
        $datos = $request;
        $fotos = array();





        
        if ($request->hasFile('file')) {
            if (count($request->file("file")) <= 10) {
                //creamos directorio
                $directorio = public_path("img\\") . $nombre . "_" . $apellido . time();
                File::makeDirectory($directorio, 0777, true);
                //
                $files = $request->file("file");
                foreach ($files as $file) {
                    $nombrearchivo  = time() . $file->getClientOriginalName();
                    $file->move(public_path("img/"), $nombrearchivo);
                    array_push($fotos, $nombrearchivo);
                }
                $directorio1 = $directorio . '\\' . $nombre . '_' . $apellido . '.pdf';
                PDF::loadView('mails.pdf', compact('fotos'))->save($directorio1);

                foreach ($fotos as $file) {
                    unlink(public_path('img/' . $file));
                }
            } else {
                if ($audio != "") {
                    File::delete(public_path() . '\\' . $audio);
                }
                return redirect()->route('welcome')->with('error', 'Solo se permiten 10 fotos adjuntas.');
            }
        }else{
            $directorio1="vacio";
        }



        //dd($directorio1);
        $myEmail = 'yunimessilah@gmail.com';
        
        Mail::to($myEmail)->send(new EmergencyCallReceived($nombre, $apellido, $audio, $directorio1, $telefono, $lat, $lng));
        
        if ($audio != "") {
            
            File::delete(public_path() . '\\' . $audio);
        }
        if (isset($directorio) && $directorio != "") {
            File::delete($directorio);
        }


        return redirect()->route('welcome')->with('mensaje', 'Hemos recibido tu consulta correctamente, pronto nos pondremos en contacto con usted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enviar  $enviar
     * @return \Illuminate\Http\Response
     */
    public function show(Enviar $enviar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enviar  $enviar
     * @return \Illuminate\Http\Response
     */
    public function edit(Enviar $enviar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enviar  $enviar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enviar $enviar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enviar  $enviar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enviar $enviar)
    {
        //
    }
}
