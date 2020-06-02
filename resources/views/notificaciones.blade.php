@extends('layouts.app')

@section('titulo')
    Notificaciones
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div>
  <a href="{{route('fnotificar')}}" class="btn btn-success mt-2">Notificar Clientes</a>
  <h1 class="text-center mt-2">Clientes notificados</h1>
    <table class="table table-dark mt-2">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Empleado</th>
            <th scope="col">Cliente</th>
            <th scope="col">Serial</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($empleados as $empleado)
          @foreach($empleado->clientes()->get() as $item)
          <tr>
              
              <td>{{$item->pivot->id}}</td>
              <td>{{$empleado->nombre}}, {{$empleado->apellido}}</td>
              <td>{{$empleado->cliente($item->pivot->cliente_id)->nombre}}, {{$empleado->cliente($item->pivot->cliente_id)->apellido}}</td>
              <td>{{$item->pivot->serialOrden}}</td>
              <td>{{$item->pivot->created_at}}</td>
              
            </tr>
            @endforeach
          @endforeach
          
          
        </tbody>
      </table>
</div>


@endsection