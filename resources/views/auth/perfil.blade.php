@extends('plantillas.plantilla')
@section('titulo')
Configuración
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif

@if ($texto=Session::get('error'))
<p class="alert alert-danger my-3">{{$texto}}</p>    
@endif
<div class="form">
    <h1 class="mb-3">Configuración de perfil</h1>
    <form action="{{route('perfil.perfil', $usuario)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-4 mb-4 mr-1">
                <label for="validationDefault01">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$usuario->name}}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4 mb-4 ml-1">
                <label for="validationDefault02">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="{{$usuario->apellido}}" required>
                @error('apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4 mb-4 ml-2">
                <label for="validationDefaultUsername">E-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-4 mr-1">
                <label for="validationDefaultUsername">Cambiar Imagen</label>
                <input type="file" class="form-control" name="foto" id="imagen">
            </div>
            <div class="col-md-4 mb-4 ml-4">
                <img src="{{asset($usuario->avatar)}}" width="75px" height="75px" class="rounded-circle">
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Modificar</button>
    </form>
</div>

@endsection