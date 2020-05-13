@extends('plantillas.plantilla')

@section('titulo')
    Crear Orden
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
<h1 class="mb-3">Nueva Orden</h1>
  <form action="{{route('ordenes.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Empleado</label>
        <select class="form-control" name="empleado">
            @foreach ($empleados as $item)
            <option value="{{$item->id}}">{{$item->nombre.", ".$item->apellido}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefault02">Cliente</label>
        <select class="form-control" name="cliente">
            @foreach ($clientes as $item)
              <option value="{{$item->id}}">{{$item->nombre.", ".$item->apellido}}</option>  
            @endforeach
        </select>
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefaultUsername">Estado</label>
        <select class="form-control" name="estado">
            @foreach ($estados as $item)
            <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select>    
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault02">Marca</label>
        <input type="text" class="form-control" name="marcaEquipo" placeholder="Marca" required>
      </div>
      <div class="col-md-4 mb-4 ml-1">
        <label for="validationDefaultUsername">Modelo</label>
          <input type="text" class="form-control" name="modeloEquipo" placeholder="Modelo"  required>    
      </div>
      <div class="col-md-4 mb-4 ml-2">
        <label for="validationDefault02">Precio</label>
        <input type="number" class="form-control" name="pvp" placeholder="Precio" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-4 mr-1">
        <label for="validationDefault01">Descripción </label>
        
        <textarea class="form-control " name="descripcionFallo" placeholder="Descripción" required></textarea>

      </div>
    </div>
          
    <button class="btn btn-primary" type="submit">Crear</button>
  </form>
</div>

@endsection