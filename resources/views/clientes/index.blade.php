@extends('plantillas.plantilla')
@section('head')
<link rel="stylesheet" href="./css/main.css">
@endsection
@section('titulo')
    Clientes de Empresa
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>    
@endif
<div>
<form name="search" action="{{route('clientes.index')}}" method="GET" class="form-inline float-right mb-3 mt-2">
    <i class="fa fa-search ml-2 mr-2" aria-hidden="true"></i>           
    DNI-NIE:
      <input type="text" name="dni" placeholder="DNI-NIE"  class="form-control ml-2">
    </form>

  <a href="{{route('clientes.create')}}" class="btn btn-success mb-2 mt-2" ><i class="lnr lnr-plus-circle"></i> Crear Cliente</a>
    
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clientes as $cliente)
          <tr>
              <th scope="row">
                  <a href="{{route('clientes.show', $cliente)}}" style="text-decoration:none"><i class="fa-2x fa fa-address-card"></i></a>
              </th>
          <td>{{$cliente->nombre}}</td>
              <td>{{$cliente->apellido}}</td>
              <td>
                    {{$cliente->mail}}
              </td>
              <td>
                  <form  action="{{route('clientes.destroy', $cliente)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('¿Desea borrar cliente?')" class="fa fa-trash btn btn-danger"></button>
                      <a href="{{route('clientes.edit', $cliente)}}" class="ml-2 lnr lnr-pencil btn btn-warning"></a>
                      </form>
              </td>
            </tr>
          @endforeach
          
          
        </tbody>
      </table>
</div>
@section('footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./js/main.js"></script>
@endsection
{{$clientes->links()}}
@endsection