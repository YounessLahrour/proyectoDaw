<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-8 ">
                <div class="card formulario">
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light">Registrar</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Nombre</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Apellido</label>
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                                    @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">DNI-NIE</label>
                                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" placeholder="DNI-NIE" value="{{ old('dni') }}" required autocomplete="dni" autofocus>
                                    @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Fecha Nacimiento</label>
                                    <input id="fechaNacimiento" type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required autocomplete="fechaNacimiento" autofocus>
                                    @error('fechaNacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Provincia</label>
                                    <select class="form-control" name="provincia">
                                        @foreach ($provincias as $provincia)
                                        <option>{{$provincia}}</option>
                                        @endforeach
                                    </select>
                                     
                                </div>
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Dirección</label>
                                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                                    @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Teléfono</label>
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-2 ">
                                    <label for="validationDefault01">Confirmar Contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password">

                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-7 mb-2 ">
                                    <label for="validationDefault01">Imagen</label>
                                    <input type="file" id="foto" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" autocomplete="foto" autofocus>
                                    @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                    <a href="{{route('login')}}" class="btn btn-success">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>