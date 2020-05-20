@extends('plantillas.plantilla')

@section('titulo')
    Editar Orden
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
<h1 class="mb-3 border-bottom">Nº Orden {{$ordene->serialOrden}}</h1>
  <form action="{{route('ordenes.update', $ordene)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Empleado</label>
        <select class="form-control" name="empleado">
            @foreach ($empleados as $item)
            @if ($item->id == $ordene->empleado_id)
            <option value="{{$item->id}}" selected>{{$item->nombre.", ".$item->apellido}}</option>
            @else
            <option value="{{$item->id}}">{{$item->nombre.", ".$item->apellido}}</option>
            @endif
            @endforeach
        </select>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Cliente</label>
        <select class="form-control" name="cliente">
            @foreach ($clientes as $item)
            @if ($item->id == $ordene->cliente_id)
            <option value="{{$item->id}}" selected>{{$item->nombre.", ".$item->apellido}}</option>
            @else
              <option value="{{$item->id}}">{{$item->nombre.", ".$item->apellido}}</option>  
            @endif
            
            @endforeach
        </select>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Estado</label>
        <select class="form-control" name="estado">
            @foreach ($estados as $item)
            @if ($item == $ordene->estadoOrden)
            <option value="{{$item}}" selected>{{$item}}</option>
            @else
            <option value="{{$item}}">{{$item}}</option>
            @endif
            @endforeach
        </select>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Serial</label>
        <input type="text" class="form-control" name="serialOrden" value="{{$ordene->serialOrden}}" readonly >
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Marca</label>
        <input type="text" class="form-control" name="marcaEquipo" value="{{$ordene->marcaEquipo}}" required>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Modelo</label>
          <input type="text" class="form-control" name="modeloEquipo"  value="{{$ordene->modeloEquipo}}" required>    
      </div>
    </div>

    <div class="form-row">
     
        <div class="col-md-4 mb-4 mr-1">
          <label for="validationDefault02">Precio</label>
          <input type="number" class="form-control" name="pvp" value="{{$ordene->pvp}}" required>
        </div>
        <div class="col-md-4 mb-4 ml-2">
          <label for="validationDefaultUsername">Fecha</label>
            <input type="text" class="form-control" name="created_at" value="{{$ordene->created_at}}" readonly >    
        </div>
      </div>

    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Descripción </label>
        
        <textarea class="form-control " name="descripcionFallo" required>{{$ordene->descripcionFallo}}</textarea>

      </div>
    </div>
    
    <a href="{{route('ordenes.index')}}" class="btn btn-primary mr-2">Volver</a>
    <button class="btn btn-success" type="submit">Modificar</button>
  </form>
</div>

@endsection