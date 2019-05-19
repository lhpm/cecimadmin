@extends('layouts.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Criterios</h3><strong>Total criterios: {{$criterios->total()}}</strong></div>
          <div class="pull-right">
            <div class="btn-group">

              <a class="btn btn-success btn-xs" href="{{ route('pregunta.create') }}"><span class="glyphicon glyphicon-plus"></span>Agregar</a>

            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Puntos</th>
               <th>Fase</th>
               <th>Ver</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>

              @if($criterios->count())

              @foreach($criterios as $criterio)
              <tr>
                <td>{{$criterio->criterio}}</td>
                <td>{{$criterio->puntos}}</td>
                <td>{{$criterio->id_fase}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{ route('pregunta.show',['id' => $criterio->id]) }}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('HomeController@ecriterio', $criterio->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                <a class="btn btn-danger btn-xs" href="{{ route('pregunta.borra',['id' => $criterio->id]) }}" ><span class="glyphicon glyphicon-trash"></span></a>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      <!-- PAGINACION -->
      {{ $criterios->links() }}

      <!-- Mensaje de Eliminación -->
      @if (Session::has('message'))

        <p class="alert alert-danger">{{ Session::get('message')}}</p>

      @endif
    </div>
  </div>
</section>
 
@endsection
