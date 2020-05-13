@extends('plantillas.plantilla')

@section('titulo')
Notificar cliente
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
    <h1 class="mb-3">Notificar a {{$cliente->nombre}}</h1>
    <form action="{{route('ordenes.notificar')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-4 mr-1">
                <label for="validationDefault01">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}" readonly>
            </div>
            <div class="col-md-4 mb-4 ml-1">
                <label for="validationDefault02">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4 ">
                <label for="validationDefaultUsername">E-mail</label>
                <input type="email" class="form-control" name="mail" value="{{$cliente->mail}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4 ">
                <label for="validationDefaultUsername">Asunto</label>
                <input type="text" class="form-control" name="asunto" placeholder="Asunto" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4 mr-1">
                <label for="validationDefault01">Mensaje</label>
                <textarea class="form-control " name="mensaje" placeholder="Mensaje" required></textarea>
            </div>
        </div>
        <input type="hidden" name="orden" value="{{$ordene->id}}">
        <input type="hidden" name="empleado" value="{{$empleado->nombre}}">
        <button class="btn btn-success" type="submit">Notificar</button>
        <a href="{{route('ordenes.index')}}" class="btn btn-info">Volver</a>
    </form>
</div>

@endsection