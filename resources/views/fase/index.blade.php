@extends('layouts.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Fases</h3>
          <p class="alert alert-info">
             <strong>¡Importante!</strong> Recuerde Editar la Fase para Habilitarla seleccionando SI.
          </p>

          </div>
          <div class="pull-right">
            <div class="btn-group">

              <a class="btn btn-success btn-xs" href="{{ route('fase.create') }}"><span class="glyphicon glyphicon-plus"></span>Agregar</a>

            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Título</th>
               <th>Fecha Final</th>
               <th>Habilitado</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>

              @if($fases->count())

              @foreach($fases as $fase)
              <tr>
                <td>{{$fase->nombre}}</td>
                <td>{{$fase->fechafin}}</td>
                <td>{{$fase->habilitado}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('HomeController@efase', $fase->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                <a class="btn btn-danger btn-xs" href="{{ route('fase.borra',['id' => $fase->id]) }}" ><span class="glyphicon glyphicon-trash"></span></a>
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
      {{ $fases->links() }}

      <!-- Mensaje de Eliminación -->
      @if (Session::has('message'))

        <p class="alert alert-danger">{{ Session::get('message')}}</p>

      @endif
    </div>
  </div>
</section>
 
@endsection
