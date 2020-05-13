@extends('plantillas.plantilla')

@section('titulo')
    Crear empleado
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
  <h1 class="mb-3">Nuevo Empleado</h1>
  <form action="{{route('empleados.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Apellido</label>
        <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">DNI-NIE</label>
          <input type="text" class="form-control" name="dni" placeholder="DNI-NIE" required>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Dirección</label>
        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Provincia</label>
        <select class="form-control" name="provincia">
          @foreach ($provincias as $provincia)
        <option >{{$provincia}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Alta/Baja</label>
        <select class="form-control" name="estadoEmpleo" required>
          <option >Alta</option>
          <option >Baja</option>
        </select>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Teléfono</label>
        <input type="number" class="form-control" name="telefono" placeholder="Teléfono" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fechaNacimiento" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail</label>
          <input type="email" class="form-control" name="mail"  placeholder="E-mail" required>    
      </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-4 mb-4 mr-1">
            <label for="validationDefaultUsername">Imagen</label>
            <input type="file" class="form-control"  name="foto" >
        </div>
      </div>
                
    <button class="btn btn-primary" type="submit">Crear</button>
  </form>
</div>

@endsection