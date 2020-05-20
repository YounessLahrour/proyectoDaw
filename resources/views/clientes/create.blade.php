@extends('plantillas.plantilla')

@section('titulo')
    Crear cliente
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
  <h1 class="mb-3 border-bottom">Nuevo Cliente</h1>
  <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
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
        <label for="validationDefault01">Teléfono</label>
        <input type="number" class="form-control" name="telefono" placeholder="Teléfono" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail</label>
          <input type="email" class="form-control" name="mail"  placeholder="E-mail" required>    
      </div>
    </div>
     
    <button class="btn btn-success" type="submit">Crear</button>
    <a href="{{route('clientes.index')}}" class="btn btn-info">Volver</a>
  </form>
</div>

@endsection