@extends('plantillas.plantilla')

@section('titulo')
    Detalles de empleado
@endsection
@section('contenido')

<div class="form">
<h1 class="mb-3 border-bottom">Detalles del empleado #{{$empleado->id}}</h1>
    <div class="form-row ml-4">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Nombre: <b>{{$empleado->nombre}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Apellido: <b>{{$empleado->apellido}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">DNI-NIE: <b>{{$empleado->dni}}</b></label>
      </div>
    </div>
    <div class="form-row ml-4 ">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Dirección: </label>
        <textarea name="" id="" cols="30" rows="1" readonly>{{$empleado->direccion}}</textarea>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Provincia: <b>{{$empleado->provincia}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Estado: <b>{{$empleado->estadoEmpleo}}</b></label>
      </div>
    </div>
    <div class="form-row ml-4">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Teléfono: <b>{{$empleado->telefono}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Fecha de Nacimiento: <b>{{$empleado->fechaNacimiento}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">E-mail: <b>{{$empleado->mail}}</b></label>
      </div>
    </div>
    
    <div class="form-row ">
        
        <div class="col-md-4 mb-4 ml-4">
        <label for="validationDefaultUsername">Imagen: </label>

            <img src="{{asset($empleado->foto)}}" width="75px" height="75px" class="rounded-circle">
            <a href="" class="btn btn-success ml-2"  onclick="window.open('{{asset($empleado->foto)}}', '_blank');">Ver Imagen</a>
        </div>
      </div>
    <a href="{{route('empleados.index')}}" class="btn btn-primary">Volver</a>          
  
</div>

@endsection