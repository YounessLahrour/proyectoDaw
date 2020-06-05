@extends('layouts.app')

@section('contenido')
    <div class="container-fluid  mt-4 " >
        <div class="row ml-4">
            <div class="col-md-3 ml-0">
                <div class="user-wrapper">
                    <ul class="users ">
                        <li class="text-center text-white bg-dark font-weight-bold">Usuarios Disponibles</li>
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                
                                <div class="media ml-5">
                                    <div class="media-left ">
                                        <img src="{{asset($user->avatar)}}" alt="" class="rounded-circle">
                                    </div>

                                    <div class="media-body ml-1">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>

                                {{--mensajes sin leer--}}
                                @if($user->unread)
                                    <span class="pending ml-3">{{ $user->unread }}</span>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a href="{{route('chat')}}"><span class="lnr lnr-arrow-left-circle btn btn-primary" hidden>Volver</span></a>
            <div class="col-md-6" id="messages">

            </div>
        </div>
    </div>
@endsection