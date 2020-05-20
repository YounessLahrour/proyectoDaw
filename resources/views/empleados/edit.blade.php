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
<h1 class="mb-3 border-bottom">{{$empleado->nombre}}, {{$empleado->apellido}}</h1>
  <form action="{{route('empleados.update', $empleado)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$empleado->nombre}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="{{$empleado->apellido}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">DNI-NIE</label>
          <input type="text" class="form-control" name="dni"  value="{{$empleado->dni}}" required>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="{{$empleado->direccion}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Provincia</label>
        <input type="text" class="form-control" name="provincia" value="{{$empleado->provincia}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Alta/Baja</label>
        <select name="estadoEmpleo" class="form-control">
          @if($empleado->estadoEmpleo == 'Alta')
          <option selected>Alta</option>
          @else
          <option>Alta</option>
          @endif

          @if($empleado->estadoEmpleo == 'Baja')
          <option selected>Baja</option>
          @else
          <option>Baja</option>
          @endif
        </select>
             
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Teléfono</label>
        <input type="number" class="form-control" name="telefono" value="{{$empleado->telefono}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fechaNacimiento" value="{{$empleado->fechaNacimiento}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail</label>
          <input type="mail" class="form-control" name="mail" value="{{$empleado->email}}" required>    
      </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-4 mb-4 mr-1">
            <label for="validationDefaultUsername">Cambiar Imagen</label>
            <input type="file" class="form-control"  name="foto"  id="imagen" >
        </div>
        <div class="col-md-4 mb-4 ml-4">
            <img src="{{asset($empleado->foto)}}" width="75px" height="75px" class="rounded-circle">
        </div>
      </div>
                
      <a href="{{route('empleados.index')}}" class="btn btn-primary mr-2">Volver</a>
    <button class="btn btn-success" type="submit">Modificar</button>
  </form>
</div>

@endsection