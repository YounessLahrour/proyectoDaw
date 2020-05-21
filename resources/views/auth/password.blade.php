@extends('plantillas.plantilla')
@section('titulo')
Cambiar password
@endsection
@section('contenido')


@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif

@if ($texto=Session::get('error'))
<p class="alert alert-danger my-3">{{$texto}}</p>    
@endif
<div class="form">
    <h1 class="mb-3 border-bottom">Cambio de Contraseña</h1>
    <form action="{{route('perfil.password', $usuario)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="col-md-4 mb-4 mr-1">
                <label for="validationDefault01">Contraseña Actual</label>
                <input type="password" class="form-control" name="passwordActual" placeholder="Contraseña Actual" required>
            </div>
            <div class="col-md-4 mb-4 ml-1">
                <label for="validationDefault02">Nueva Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nueva Contraseña" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4 mb-4 ml-2">
                <label for="validationDefaultUsername">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password">
            </div>
        </div>

        <a href="{{route('home')}}" class="btn btn-primary mr-2">Volver</a>
        <button class="btn btn-success" type="submit">Modificar</button>
    </form>
</div>
@endsection