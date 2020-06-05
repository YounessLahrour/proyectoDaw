@extends('plantillas.plantilla')
@section('head')
<link rel="stylesheet" href="./css/main.css">
@endsection
@section('titulo')
    Empleados de Empresa
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif
@if ($texto=Session::get('error'))
<p class="alert alert-danger my-3">{{$texto}}</p>    
@endif
<div>
<div class="d-flex justify-content-between ml-2 mb-0">
 
<div class="btn-group mt-2 ml-1" role="group" aria-label="Basic example">
  <label for="empleaos">Empleados:</label>
<a href="{{route('empleados.index')}}"><button type="button" class="btn btn-primary">Activos</button></a> 
 <a href="{{route('inactivos')}}"><button type="button" class="btn btn-secondary">Inactivos</button></a>   
  </div>
<form name="search" action="{{route('empleados.index')}}" method="GET" class="form-inline float-right mb-2 mt-2">
    <i class="fa fa-search  mr-2" aria-hidden="true"></i>           
    Empleado: 
    <select name="filtro" onchange="this.form.submit()" class="form-control ml-2 mr-2 mb-1">
            <option value="%">Todos...</option>
            @if ($request->filtro == '1')
            <option value="1" selected>Con + ordenes Finalizadas</option>
            @else
            <option value="1">Con + ordenes Finalizadas</option>
            @endif
            @if ($request->filtro == '2')
            <option value="2" selected>Con - ordenes Finalizadas</option>
            @else
            <option value="2">Con - ordenes Finalizadas</option>
            @endif
            @if ($request->filtro == '3')
            <option value="3" selected>Con más ingresos generados</option>
            @else
            <option value="3" >Con más ingresos generados</option>    
            @endif
            
    </select>
    DNI-NIE:
      <input type="text" name="dni" placeholder="DNI-NIE"  class="form-control ml-1">
    </form>
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
                      <button type="submit" onclick="return confirm('¿Desea borrar empleado-usuario?')" class="fa fa-trash  btn btn-danger mb-1"></button>
                      <a href="{{route('empleados.edit', $empleado)}}" class="ml-1 mb-1 lnr lnr-pencil btn btn-warning"></a>
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