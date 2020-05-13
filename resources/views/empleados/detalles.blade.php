@extends('plantillas.plantilla')

@section('titulo')
    Editar empleado
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $miError)
        <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form">
<h1 class="mb-3">{{$empleado->nombre}}, {{$empleado->apellido}}</h1>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$empleado->nombre}}" readonly>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="{{$empleado->apellido}}" readonly>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">DNI-NIE</label>
          <input type="text" class="form-control" name="dni"  value="{{$empleado->dni}}" readonly>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="{{$empleado->direccion}}" readonly>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Provincia</label>
        <input type="text" class="form-control" name="provincia" value="{{$empleado->provincia}}" readonly>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Alta/Baja</label>
          <input type="text" class="form-control" name="estadoEmpleo"  value="{{$empleado->estadoEmpleo}}" readonly>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Teléfono</label>
        <input type="text" class="form-control" name="telefono" value="{{$empleado->telefono}}" readonly>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fechaNacimiento" value="{{$empleado->fechaNacimiento}}" readonly>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail</label>
          <input type="mail" class="form-control" name="mail" value="{{$empleado->mail}}" readonly>    
      </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-4 mb-4 ml-4">
            <img src="{{asset($empleado->foto)}}" width="75px" height="75px" class="rounded-circle">
        </div>
      </div>
    <a href="{{route('empleados.index')}}" class="btn btn-primary">Volver</a>          
  
</div>

@endsection