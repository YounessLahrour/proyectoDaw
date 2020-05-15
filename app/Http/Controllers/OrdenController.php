<?php

namespace App\Http\Controllers;

use App\Orden;
use App\Cliente;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\OrdenRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\EmergencyCallReceived;

class OrdenController extends Controller
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
    public function index(Request $request)
    {
        //
        $empleado=Empleado::where('dni', Auth::user()->dni)->first();
       // dd($empleado->nombre);

        $serial=$request->get('serial');
        $estado=$request->get('estado');
        $ordenes = Orden::orderBy('id')
        ->where('empleado_id',$empleado->id)
        ->estado($estado)
        ->serial($serial)
        ->paginate(5);
        return view('ordenes.index', compact('ordenes','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = ['Abierta', 'Pendiente', 'Cerrada'];
        $empleados = Empleado::orderBy('id')->get();
        $clientes = Cliente::orderBy('id')->get();
        return view('ordenes.create', compact('empleados', 'clientes', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdenRequest $request)
    {
        //
        //validaciones genericas
        $datos = $request->validated();
        //creo un objeto de orden
        $ordene = new Orden();
        //cojo los datos por que voy a modificar el request
        $ordene->empleado_id = $datos['empleado'];
        $ordene->cliente_id = $datos['cliente'];
        $ordene->estadoOrden = $datos['estado'];
        $ordene->serialOrden = time();
        $ordene->marcaEquipo = $datos['marcaEquipo'];
        $ordene->modeloEquipo = $datos['modeloEquipo'];
        $ordene->descripcionFallo = $datos['descripcionFallo'];
        $ordene->pvp = $datos['pvp'];


        $ordene->save();
        return redirect()->route('ordenes.index')->with('mensaje', 'Orden creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $ordene)
    {
        //
        return view('ordenes.detalles', compact('ordene'));
    }
/*
    public function fnotificar(Orden $ordene)
    {
        $cliente = Cliente::find($ordene->cliente_id);
        $empleado = Empleado::find($ordene->empleado_id);

        return view('ordenes.notificar', compact('cliente', 'empleado', 'ordene'));
    }*/

    public function notificar(Request $request)
    {
        $empleado=Empleado::find($request->empleado);
        $ordene = Orden::find($request->orden);
        $cliente = Cliente::find($ordene->cliente_id);
        Mail::to($cliente->mail)->send(new EmergencyCallReceived($ordene));
        $ordene->notificacion="Notificado";
        $ordene->update();
        $empleado->clientes()->attach($cliente->id, ['serialOrden'=>$ordene->serialOrden]);
        return redirect()->route('ordenes.index')->with('mensaje', 'Cliente notificado con éxito');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $ordene)
    {
        //
        $estados = ['Abierta', 'Pendiente', 'Cerrada'];
        $empleados = Empleado::orderBy('id')->get();
        $clientes = Cliente::orderBy('id')->get();
        return view('ordenes.edit', compact('empleados', 'clientes', 'ordene', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(OrdenRequest $request, Orden $ordene)
    {
        //
        //validaciones genericas
        $datos = $request->validated();
        //cojo los datos por que voy a modificar el request
        $ordene->empleado_id = $datos['empleado'];
        $ordene->cliente_id = $datos['cliente'];
        $ordene->estadoOrden = $datos['estado'];
        $ordene->marcaEquipo = $datos['marcaEquipo'];
        $ordene->modeloEquipo = $datos['modeloEquipo'];
        $ordene->descripcionFallo = $datos['descripcionFallo'];
        $ordene->pvp = $datos['pvp'];


        $ordene->update();
        return redirect()->route('ordenes.index')->with('mensaje', 'Orden modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
