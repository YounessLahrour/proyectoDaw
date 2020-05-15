@extends('plantillas.plantilla')

@section('titulo')
    Detalles de Orden
@endsection
@section('contenido')

<div class="form">
<h1 class="mb-3 border-bottom">Detalles de orden #{{$ordene->id}}</h1>
    <div class="form-row ml-4">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Empleado: <b>{{$ordene->nombreEmpleado($ordene->empleado_id)}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Cliente: <b>{{$ordene->nombreCliente($ordene->cliente_id)}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Estado: <b>{{$ordene->estadoOrden}}</b></label>
      </div>
    </div>
    <div class="form-row ml-4 ">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault02">Serial: <b>{{$ordene->serialOrden}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Marca equipo: <b>{{$ordene->marcaEquipo}}</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Modelo equipo: <b>{{$ordene->modeloEquipo}}</b></label>
      </div>
    </div>
    <div class="form-row ml-4">
      
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault02">Precio: <b>{{$ordene->pvp}} €</b></label>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Notificación: <b>{{$ordene->notificacion}}</b></label>
      </div>
    </div>
    <div class="col-md-4 mb-4 ml-0">
        <label for="validationDefault01">Descripción Fallo:</label>
        <textarea cols="30" rows="3" readonly>{{$ordene->descripcionFallo}}</textarea>
      </div>
    
  
    <a href="{{route('ordenes.index')}}" class="btn btn-primary ml-3">Volver</a>          
  
</div>

@endsection