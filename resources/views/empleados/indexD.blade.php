@extends('plantillas.plantilla')
@section('head')
<link rel="stylesheet" href="./css/main.css">
@endsection
@section('titulo')
    Empleados inactivos
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif

<div>
<div class="d-flex justify-content-between ml-2 mb-0">
 
 <div class="btn-group mt-2 ml-1" role="group" aria-label="Basic example">
   <label for="empleaos">Empleados:</label>
 <a href="{{route('empleados.index')}}"><button type="button" class="btn btn-secondary">Activos</button></a> 
  <a href="{{route('inactivos')}}"><button type="button" class="btn btn-primary">Inactivos</button></a>   
   </div>
</div>
<div class="table-responsive ml-1">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Foto</th>
            <th scope="col">Ordenes Pendientes</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($empleados as $empleado)
          <tr>
              <th scope="row" style="display: table-cell;
   vertical-align: middle">
                  <a href="{{route('empleados.show', $empleado)}}" style="text-decoration:none"><i class=" fa fa-address-card fa-2x"></i></a>
              </th>
          <td style="display: table-cell;
   vertical-align: middle">{{$empleado->nombre}}</td>
              <td style="display: table-cell;
   vertical-align: middle">{{$empleado->apellido}}</td>
              <td style="display: table-cell;
   vertical-align: middle">
                  <img src="{{asset($empleado->foto)}}" width="50px" height="50px" class="rounded-circle">
              </td>
              <td style="display: table-cell;
   vertical-align: middle">{{$empleado->ordenes()}}</td>
              <td style="display: table-cell;
   vertical-align: middle">
                  <form  action="{{route('empleados.destroy', $empleado)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('¿Desea borrar empleado?')" class="fa fa-trash  btn btn-danger "></button>
                      <a href="{{route('empleados.edit', $empleado)}}" class="ml-1  lnr lnr-pencil btn btn-warning"></a>
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
{{$empleados->links()}}
@endsection