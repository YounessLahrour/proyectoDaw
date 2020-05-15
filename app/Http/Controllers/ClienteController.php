<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes=Cliente::orderBy('id')
        ->paginate(5);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        //
        $datos=$request->validated();
        //creo un objeto cliente
        //cojo los datos por que voy a modificar el request
        $cliente=new Cliente();
        $cliente->nombre=$datos['nombre'];
        $cliente->apellido=$datos['apellido'];
        $cliente->dni=$datos['dni'];
        $cliente->telefono=$datos['telefono'];
        $cliente->mail=$datos['mail'];
 
        $cliente->save();
        return redirect()->route('clientes.index')->with('mensaje', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        return view('clientes.detalles', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        //
         //validaciones genericas
       $datos=$request->validated();
       //cojo los datos por que voy a modificar el request
       $cliente->nombre=$datos['nombre'];
       $cliente->apellido=$datos['apellido'];
       $cliente->dni=$datos['dni'];
       $cliente->telefono=$datos['telefono'];
       $cliente->mail=$datos['mail'];

       $cliente->update();
       return redirect()->route('clientes.index')->with('mensaje', 'Cliente modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        //y volvemos al index 
        return redirect()->route('clientes.index')->with('mensaje','Cliente borrado correctamente');
    }
}