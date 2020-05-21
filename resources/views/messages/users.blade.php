@extends('layouts.app')

@section('contenido')
    <div class="container-fluid ml-4 mt-4">
        <div class="row ml-4">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users ">
                        <li class="text-center text-white bg-dark font-weight-bold">Usuarios Disponibles</li>
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                
                                <div class="media ml-4">
                                    <div class="media-left ml-0">
                                        <img src="{{asset($user->avatar)}}" alt="" class="rounded-circle">
                                    </div>

                                    <div class="media-body ml-4">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>

                                {{--will show unread count notification--}}
                                @if($user->unread)
                                    <span class="pending ml-3">{{ $user->unread }}</span>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">

            </div>
        </div>
    </div>
@endsection