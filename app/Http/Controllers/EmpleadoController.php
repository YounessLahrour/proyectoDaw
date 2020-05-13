<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Storage;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $empleados=Empleado::orderBy('id')
        ->paginate(5);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provincias=["Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Islas Baleares", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo", "Madrid", "Málaga", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza"];

        return view('empleados.create', compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        //
 //validaciones genericas
       $datos=$request->validated();
       //cojo los datos por que voy a modificar el request
       $empleado=new Empleado();
       $empleado->nombre=$datos['nombre'];
       $empleado->apellido=$datos['apellido'];
       $empleado->dni=$datos['dni'];
       $empleado->provincia=$datos['provincia'];
       $empleado->estadoEmpleo=$datos['estadoEmpleo'];
       $empleado->fechaNacimiento=$datos['fechaNacimiento'];
       $empleado->direccion=$datos['direccion'];
       $empleado->telefono=$datos['telefono'];
       $empleado->mail=$datos['mail'];
       
        //compruebo si he subido archivo
        if(isset($datos['foto'])){
           //Todo bien hemos subido un archivo y es de imagen
           $file=$datos['foto'];
           //creo un nombre
           $nombre='empleados/'.time().' '.$file->getClientOriginalName();
           //guardo ek archivo imagen
           Storage::disk('public')->put($nombre, \File::get($file));
           //le damos a alumno un nombre que le hemos puesto al fichero
           $empleado->foto="img/$nombre";

       }
       $empleado->save();
       return redirect()->route('empleados.index')->with('mensaje', 'Empleado creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
        return view('empleados.detalles', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, Empleado $empleado)
    {
        //
        //validaciones genericas
       $datos=$request->validated();
       //cojo los datos por que voy a modificar el request
       $empleado->nombre=$datos['nombre'];
       $empleado->apellido=$datos['apellido'];
       $empleado->dni=$datos['dni'];
       $empleado->provincia=$datos['provincia'];
       $empleado->estadoEmpleo=$datos['estadoEmpleo'];
       $empleado->fechaNacimiento=$datos['fechaNacimiento'];
       $empleado->direccion=$datos['direccion'];
       $empleado->telefono=$datos['telefono'];
       $empleado->mail=$datos['mail'];
       
        //compruebo si he subido archivo
        if(isset($datos['foto'])){
           //Todo bien hemos subido un archivo y es de imagen
           $file=$datos['foto'];
           //creo un nombre
           $nombre='empleados/'.time().' '.$file->getClientOriginalName();
           //guardo ek archivo imagen
           Storage::disk('public')->put($nombre, \File::get($file));
           //le damos a alumno un nombre que le hemos puesto al fichero
           $empleado->foto="img/$nombre";

       }
       $empleado->update();
       return redirect()->route('empleados.index')->with('mensaje', 'Empleado modificado correctamente');
    }


    public function notificaciones(){
        $empleados=Empleado::orderBy('id')->get();
        return view('notificaciones', compact('empleados'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
         //guardo la imagen del $empleado a borrar
         $foto=$empleado->foto;
         //compruebo que la foto no sea default
         if(basename($foto)!="default.jpg"){
             //borro la foto si no es default
             unlink($foto);
         }
         //borramos el $empleado
         $empleado->delete();
         //y volvemos al index de em$empleado
         return redirect()->route('empleados.index')->with('mensaje','Empleado borrado correctamente');
    }
}
