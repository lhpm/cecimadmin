@extends('layouts.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Comunicados</h3>
            <strong>Total comunicados: {{$comunicados->total()}}</strong></div>
          <div class="pull-right">
            <div class="btn-group">

              <a class="btn btn-success btn-xs" href="{{ route('comunicado.create') }}"><span class="glyphicon glyphicon-plus"></span>Agregar</a>

            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Título</th>
               <th>Ver</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>

              @if($comunicados->count())

              @foreach($comunicados as $comunicado)
              <tr>
                <td>{{$comunicado->titulo}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('HomeController@showcom', $comunicado->id)}}" ><span class="glyphicon glyphicon-search"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('HomeController@ecomunicado', $comunicado->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                <a class="btn btn-danger btn-xs" href="{{ route('comunicado.borra',['id' => $comunicado->id]) }}" ><span class="glyphicon glyphicon-trash"></span></a>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">¡ No hay comunicados !</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      <!-- PAGINACION -->
      {{ $comunicados->links() }}

      <!-- Mensaje de Eliminación -->
      @if (Session::has('message'))

        <p class="alert alert-danger">{{ Session::get('message')}}</p>

      @endif
    </div>
  </div>
</section>
 
@endsection
