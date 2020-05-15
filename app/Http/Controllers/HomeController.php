<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Orden;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ganancias=Orden::whereMonth('created_at', date('m'))->sum('pvp');
        $ordenes=Orden::where('estadoOrden', 'like', 'abierta')->orWhere('estadoOrden', 'like', 'pendiente')->count();
        $clientes=Cliente::all()->count();
        return view('home', compact('clientes', 'ordenes', 'ganancias'));
    }
    
}
