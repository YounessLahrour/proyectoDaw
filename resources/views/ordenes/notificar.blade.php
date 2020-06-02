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
    <h1 class="mb-3">Notificar a Clientes</h1>
    <form action="{{route('ordenes.notificarAll')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-md-8 mb-4 mr-1">
                <label for="validationDefault01">Mensaje</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="14" cols="50" name="mensaje" required></textarea>
            </div>
        </div>

        <button class="btn btn-success" type="submit">Notificar</button>
        <a href="{{route('notificacion')}}" class="btn btn-info">Volver</a>
    </form>
</div>

@endsection