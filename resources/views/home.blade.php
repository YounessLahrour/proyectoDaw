@extends('layouts.app')

@section('contenido')
<div>
    <form name="search" action="#" method="GET" class="form-inline float-right">
    <i class="fa fa-search ml-2 mr-2" aria-hidden="true"></i>           
    Vendedores con venta de:
    <select name="articulo_id" onchange="this.form.submit()">
            <option value="%">Todos...</option>
            <option value="%">youness</option>
            <option value="%">juan</option>
    </select>
    Filtrar por:
      <select name="filtro" onchange="this.form.submit()">
              <option value="%">Todos...</option>
              <option value="ventas" selected>Vend. con mas ventas</option>
              
              <option value="ventas">Vend. con mas ventas</option>
              
              <option value="ingresos" selected>Más ingresos generados</option>
              
              <option value="ingresos" >Más ingresos generados</option>    
                   
                 
      </select>
    <input type="submit" value="Buscar" class="btn btn-info ml-2">
    </form>
    <a href="#" class="btn btn-info mr-2" ><i class="lnr lnr-plus-circle"></i> Crear Vendedor</a>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>#</td>

          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>#</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>#</td>
          </tr>
          <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>#</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>#</td>
              </tr>
              <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                  <td>#</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>#</td>
                  </tr>
                  <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                      <td>#</td>
                    </tr>
        </tbody>
      </table>
</div>
@endsection
