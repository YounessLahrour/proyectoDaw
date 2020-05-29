<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href={{asset("./css/main.css")}}>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- liks fom -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- PWA assets-->
    @laravelPWA
    <style>
        A:link {text-decoration:none;} A:visited {text-decoration:none;} A:active {text-decoration:none;}
        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        .user-wrapper,
        .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;

        }

        .user {
            cursor: pointer;
            padding: 10px 0;
            position: relative;
            margin-right: 20px;
            padding-right: 10px;
            width: 100%;
            height: 100px;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #F55A39;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 20px;
            padding-left: 7px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 80px;
            height: 80px;
        }

        .media-body p {
            margin: 6px 0;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received,
        .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
            color:#717171;
        }

        .sent {
            background: #A8B0A5;
            float: right;
            text-align: right;
            color: white;
        }

        .message p {
            margin: 5px 0;
        }

        .date {
            
            font-size: 12px;
        }

        .active {
            background: #eeeeee;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
            margin-top: -9px;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
    </style>
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">
        @guest

        @else
        <div class="content-menu">
            <a href="{{route('perfil')}}">
                <li><span class="icon8"></span>
                    <h4 class="text8"></h4><img src="{{asset(Auth::user()->avatar)}}" width="50px" height="50px" class="rounded-circle">
                </li>
            </a>
            <a href="{{route('home')}}" class="i1">
                <li><span class="lnr lnr-home icon1"></span>
                    <h4 class="text1">Inicio</h4>
                </li>
            </a>
            <a href="{{route('empleados.index')}}">
                <li><span class="lnr lnr-users icon2"></span>
                    <h4 class="text2">Empleados</h4>
                </li>
            </a>
            <a href="{{route('clientes.index')}}">
                <li><span class="lnr lnr-user icon8"></span>
                    <h4 class="text8">Cliente</h4>
                </li>
            </a>
            <a href="{{route('ordenes.index')}}">
                <li><span class="lnr lnr-file-empty icon3"></span>
                    <h4 class="text3">Ordenes</h4>
                </li>
            </a>
            <a href="{{route('notificacion')}}">
                <li><span class="lnr lnr-envelope icon4"></span>
                    <h4 class="text4">Notificación</h4>
                </li>
            </a>
            <a href="{{route('chat')}}">
                <li><span class="lnr lnr-bubble icon5"></span>
                    <h4 class="text5">Chat</h4>
                </li>

            </a>
            <a href="{{route('password')}}">
                <li><span class="lnr lnr-cog icon6"></span>
                    <h4 class="text6">Configuración</h4>
                </li>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                <li><span class="lnr lnr-exit icon7"></span>
                    <h4 class="text7">Salir</h4>
                </li>
            </a>
        </div>

        <span class="lnr lnr-menu background:red"></span>
        <div class="main_content">
            <div class="header ">

                <div class="box ">{{ Auth::user()->name }}, {{ Auth::user()->apellido }} <img src="{{asset(Auth::user()->avatar)}}" width="50px" height="50px" class="rounded-circle"></div>
                <div class="box first">YuniTic S.L</div>
            </div>
            <div class="info">

                @yield('contenido')
            </div>
            @endguest

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src={{asset("./js/main.js")}}></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        
        var receptor_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function() {
            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('fbab854e1a8d8bf41d42', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));
                if (my_id == data.from) {
                    $('#' + data.to).click();
                } else if (my_id == data.to) {
                    if (receptor_id == data.from) {
                        // if receiver is selected, reload the selected user ...
                        $('#' + data.from).click();
                    } else {
                        // if receiver is not seleted, add notification for that user
                        var pending = parseInt($('#' + data.from).find('.pending').html());

                        if (pending) {
                            $('#' + data.from).find('.pending').html(pending + 1);
                        } else {
                            $('#' + data.from).append('<span class="pending">1</span>');
                        }
                    }
                }
            });

            $('.user').click(function() {
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();

                receptor_id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "message/" + receptor_id, 
                    data: "",
                    cache: false,
                    success: function(data) {
                        $('#messages').html(data);
                        scrollToBottomFunc();
                    }
                });
            });
            

            $(document).on('keyup', '.input-text input', function(e) {
                var message = $(this).val();
                //Compruebo si se ha presionado la tecla Enter y que el mensaje no esta vacio y que se haya seleccionado un user

                if (e.keyCode == 13 && message != '' && receptor_id != '') {
                    $(this).val(''); // cuendo presiono Enter vacio el campo 

                    var datastr = "receptor_id=" + receptor_id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "message", 
                        data: datastr,
                        cache: false,
                        success: function(data) {

                        },
                        error: function(jqXHR, status, err) {},
                        complete: function() {
                            scrollToBottomFunc();
                        }
                    })
                }
            });
        });

        // make a function to scroll down auto
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 50);
        }
    </script>

</body>

</html>