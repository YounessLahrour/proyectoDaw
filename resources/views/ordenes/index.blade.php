@extends('plantillas.plantilla')
@section('head')
<link rel="stylesheet" href="./css/main.css">
@endsection
@section('titulo')
Ordenes
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div>
  <div class="d-flex justify-content-between ml-2 mb-0">

    <div class="btn-group mt-2 ml-1" role="group" aria-label="Basic example">
      <a href="{{route('ordenes.create')}}" class="btn btn-success mb-2 mt-2"><i class="lnr lnr-plus-circle"></i> Nueva Orden</a>
    </div>

    <form name="search" action="{{route('ordenes.index')}}" method="GET" class="form-inline float-right  mb-3 mt-2">

      <i class="fa fa-search ml-2 mr-2" aria-hidden="true"></i>
      Empleado:
      <select name="empleado_id" onchange="this.form.submit()" class="form-control input-sm ml-2 mr-2 mb-1">
        <option value="%">Todos...</option>
        @foreach ($empleados as $item)
        @if ($item->id== $request->empleado_id)
        <option value="{{$item->id}}" selected>{{$item->nombre}}, {{$item->apellido}}</option>
        @else
        <option value="{{$item->id}}">{{$item->nombre}}, {{$item->apellido}}</option>
        @endif
        @endforeach
      </select>
      Estado:
      <select class="form-control input-sm ml-2 mr-2 mb-1" name="estado" onchange="this.form.submit()">
        @if($request->estado=="%")
        <option value="%" selected>...</option>
        @else
        <option value="%">...</option>
        @endif
        @if($request->estado=="Abierta")
        <option selected>Abierta</option>
        @else
        <option>Abierta</option>
        @endif
        @if($request->estado=="Pendiente")
        <option selected>Pendiente</option>
        @else
        <option>Pendiente</option>
        @endif
        @if($request->estado=="Cerrada")
        <option selected>Cerrada</option>
        @else
        <option>Cerrada</option>
        @endif
      </select>
      Nº Serial:
      <input type="text" name="serial" placeholder="Nº Serial" class="form-control  ml-2 mb-1 serial" minlength="8" maxlength="8">
    </form>
  </div>

  <div class="table-responsive ml-1">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Detalles</th>
          <th scope="col">Empleado</th>
          <th scope="col">Cliente</th>
          <th scope="col">Serial</th>
          <th scope="col">Estado</th>
          <th scope="col">Notificación</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ordenes as $ordene)
        <tr>
          <th scope="row" style="display: table-cell;
   vertical-align: middle">
            <a href="{{route('ordenes.show', $ordene)}}" style="text-decoration:none"><i class="fa-2x fa fa-address-card"></i></a>
          </th>
          <td scope="col" style="display: table-cell;
   vertical-align: middle">{{$ordene->nombreEmpleado($ordene->empleado_id)}}</td>
          <td scope="col" style="display: table-cell;
   vertical-align: middle">{{$ordene->nombreCliente($ordene->cliente_id)}}</td>
          <td scope="col" style="display: table-cell;
   vertical-align: middle">{{$ordene->serialOrden}}</td>
          <td scope="col" style="display: table-cell;
   vertical-align: middle">{{$ordene->estadoOrden}}</td>
          <td scope="col" style="display: table-cell;
   vertical-align: middle">{{$ordene->notificacion}}</td>
          <td scope="col" id="for" style="display: table-cell;
   vertical-align: middle">

            <form action="{{route('ordenes.destroy', $ordene)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('¿Desea borrar orden?')" title="Borrar Orden" class="fa fa-trash btn btn-danger ml-2 mb-1"></button>
              <a href="{{route('ordenes.edit', $ordene)}}" title="Editar Orden" class="ml-2 mb-0 lnr lnr-pencil btn btn-warning"></a>

            </form>

            <form action="{{route('ordenes.notificar')}}" method="POST">
              @csrf
              <input type="hidden" name="empleado" value="{{$ordene->empleado_id}}">
              <input type="hidden" name="orden" value="{{$ordene->id}}">
              @if( $ordene->notificacion=="Notificado")
              <button type="submit" onclick="return confirm('El cliente esta notificado ¿Volver a notificar?')" title="Notificar Cliente" class="ml-2 mt-1 lnr lnr-envelope btn btn-info"></button>
              @elseif($ordene->estadoOrden=="Abierta" || $ordene->estadoOrden=="Pendiente")
              <button type="submit" onclick="return confirm('La orden esta sin Cerrar. ¿Desea notificar cliente?')" title="Notificar Cliente" class="ml-2 mt-1 lnr lnr-envelope btn btn-info"></button>
              @else
              <button type="submit" onclick="return confirm('¿Desea notificar cliente?')" title="Notificar Cliente" class="ml-2 mt-1 lnr lnr-envelope btn btn-info"></button>
              @endif
            </form>

          </td>
        </tr>
        @endforeach


      </tbody>
    </table>
  </div>
</div>
@section('footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./js/main.js"></script>
@endsection
{{$ordenes->appends(Request::except('page'))->links()}}
@endsection