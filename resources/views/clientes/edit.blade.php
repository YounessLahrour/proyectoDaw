@extends('plantillas.plantilla')

@section('titulo')
    Editar cliente
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
<h1 class="mb-3 border-bottom">{{$cliente->nombre}}, {{$cliente->apellido}}</h1>
  <form action="{{route('clientes.update', $cliente)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">DNI-NIE</label>
          <input type="text" class="form-control" name="dni"  value="{{$cliente->dni}}" required>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Teléfono</label>
        <input type="number" class="form-control" name="telefono" value="{{$cliente->telefono}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail</label>
          <input type="mail" class="form-control" name="mail" value="{{$cliente->mail}}" required>    
      </div>
    </div>
                
    <a href="{{route('clientes.index')}}" class="btn btn-primary mr-2">Volver</a>
    <button class="btn btn-success" type="submit">Modificar</button>
  </form>
</div>

@endsection