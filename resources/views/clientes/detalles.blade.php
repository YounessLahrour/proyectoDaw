@extends('plantillas.plantilla')

@section('titulo')
    Detalles de Cliente
@endsection
@section('contenido')

<div class="form">
<h1 class="mb-3 border-bottom">Detalles del cliente #{{$cliente->id}}</h1>
    <div class="form-row ml-4">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Nombre: <b>{{$cliente->nombre}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Apellido: <b>{{$cliente->apellido}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">DNI-NIE: <b>{{$cliente->dni}}</b></label>
      </div>
    </div>

    <div class="form-row ml-4">
    <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">ID Cliente: <b>{{$cliente->id}}</b></label>
      </div>
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Teléfono: <b>{{$cliente->telefono}}</b></label>
      </div>

      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail: <b>{{$cliente->email}}</b></label>
      </div>
    </div>
    
    
    <a href="{{route('clientes.index')}}" class="btn btn-primary">Volver</a>          
  
</div>

@endsection