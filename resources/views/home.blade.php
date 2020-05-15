@extends('layouts.app')

@section('contenido')
<div>
<table class="table table-borderless table-dark  mt-5 ">
  <thead>
    <tr class="mb-5">
      <th scope="col"><i class="lnr lnr-laptop-phone iconos"></i> <br> Equipos en Reparación  </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" >{{$ordenes}}</th>

    </tr>
    <tr>
      <th scope="row"><a href="{{route('ordenes.index')}}" class="btn btn-primary"><i class="fas fa-arrow-right mr-1"></i>Ver Detalles</a></th>

    </tr>
  </tbody>
</table>

<table class="table table-borderless table-dark  mt-3 ">
  <thead>
    <tr class="mb-5">
      <th scope="col"><i class="lnr lnr-users iconos"></i> <br> Número de Clientes  </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" >{{$clientes}}</th>

    </tr>
    <tr>
      <th scope="row"><a href="{{route('clientes.index')}}" class="btn btn-primary"><i class="fas fa-arrow-right mr-1"></i>Ver Detalles</a></th>

    </tr>
  </tbody>
</table>

<table class="table table-borderless table-dark  mt-3 ">
  <thead>
    <tr class="mb-5">
      <th scope="col"><i class="fas fa-dollar-sign fa-2x"></i>

<br> Ganancias Estimadas /mes  </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" >{{$ganancias}} €</th>

    </tr>

  </tbody>
</table>
</div>
@endsection
