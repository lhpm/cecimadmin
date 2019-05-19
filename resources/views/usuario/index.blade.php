@extends('layouts.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Alumnos</h3><a href="{{ route('usuario.jurado') }}">Lista Jurado</a></div>
          <div class="pull-right">
            <div class="btn-group">

            <form method="GET" action="{{ route('home') }}" class="navbar-form pull-right"> 
              <div class="input-group"> 
                <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre"> 
                  <span class="input-group-btn"> 
                    <button type="submit" class="btn btn-default"> 
                        <span class="glyphicon glyphicon-search"></span> 
                    </button> 
                </span> 
              </div> 
            </form>

            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Ver</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($alumnos->count())
              @foreach($alumnos as $alumno)
              <tr>
                <td>{{$alumno->name}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{ route('usuario.show',['id' => $usuario->id]) }}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('UsuarioController@edit', $usuario->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('UsuarioController@destroy', $alumno->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
      {{ $alumnos->links() }}
    </div>
  </div>
</section>
 
@endsection
