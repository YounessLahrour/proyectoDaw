@extends('layouts.app')

@section('contenido')
<script>
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
  checkCookie();
  }


  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
      begin = dc.indexOf(prefix);
      if (begin != 0) return null;
    } else {
      begin += 2;
      var end = document.cookie.indexOf(";", begin);
      if (end == -1) {
        end = dc.length;
      }
    }

    return decodeURI(dc.substring(begin + prefix.length, end));
  }
  //comprobar si se ha avisado al usuario
  function checkCookie() {
    var pantalla = getCookie("pantalla");
    if (pantalla == null) {
      alert('Es recomendable usar la pantalla en horizontal, para tener mejor uso.');
      setCookie("pantalla", 'avisado', 365);
    }
  }
</script>
<div>
  <h1 class="text-center mt-2">Bienvenido</h1>
  <table class="table table-borderless table-dark  ">
    <thead>
      <tr class="mb-5">
        <th scope="col"><i class="lnr lnr-laptop-phone iconos"></i> <br> Equipos en Reparación </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$ordenes}}</th>

      </tr>
      <tr>
        <th scope="row"><a href="{{route('ordenes.index')}}" class="btn btn-primary"><i class="fas fa-arrow-right mr-1"></i>Ver Detalles</a></th>

      </tr>
    </tbody>
  </table>

  <table class="table table-borderless table-dark  mt-3 ">
    <thead>
      <tr class="mb-5">
        <th scope="col"><i class="lnr lnr-users iconos"></i> <br> Número de Clientes </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$clientes}}</th>

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

          <br> Ganancias Estimadas /mes </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$ganancias}} €</th>

      </tr>

    </tbody>
  </table>
</div>
@endsection