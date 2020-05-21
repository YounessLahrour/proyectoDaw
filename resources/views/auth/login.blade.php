<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        @if ($texto=Session::get('mensaje'))
        <p class="alert alert-success text-center my-3 mt-3">{{$texto}}</p>
        @endif
        <div class="row justify-content-center pt-5 mt-5 m-1">
            
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light">Iniciar Sesión</h1>
                    </div>

                    <div class="form-group mx-sm-4 pt-3">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="lnr lnr-user"></i></div>
                            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>


                        </div>

                    </div>
                    <div class="form-group mx-sm-4">

                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="lnr lnr-lock"></i></div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                        </div>

                    </div>
                    <div class="form-group mx-sm-4 ">
                        <input type="submit" class="btn btn-block iniciar" value="Entrar">
                    </div>
                    {!! $errors->first('error', '<span class="help-block" style="color:red">:message</span>') !!}
                    
                    <div class="form-group mx-sm-4  text-right">
                        <span class=""><a href="{{route('password.request')}}" class="olvide">¿Has olvidado la contraseña?</a></span>
                    </div>

                </form>


            </div>

        </div>
        <div class="form-group text-center">
            <span class="olvide">¿No tienes cuenta? <a href="{{route('register')}}" class="olvide"><b>Registrate aquí</b></a></span>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>