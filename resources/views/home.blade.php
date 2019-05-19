@extends('layouts.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
            <!-- Mensaje límite -->
            @if (Session::has('mensaje'))

            <p class="alert alert-success">{{ Session::get('mensaje')}}</p>

            @endif
          <div class="pull-left"><h3>Alumnos</h3><strong>Total alumnos: {{$alumnos->total()}}</strong></div>
          <div class="pull-right">
            <div class="btn-group">

            <form method="GET" action="{{ route('home') }}" class="navbar-form pull-right"> 
              <div class="input-group"> 
                <input type="text" class="form-control" name="name" placeholder="Buscar por nombre"> 
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
               <th>Código</th>
               <th>Nombre</th>
               <th>Certificar</th>
               <th>Ver</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($alumnos->count())
              @foreach($alumnos as $alumno)
              <tr>
                <td>{{$alumno->vinculacion}}</td>
                <td>{{$alumno->name}}</td>
                <td><a class="btn btn-warning btn-xs" href="{{action('HomeController@ccertificar', $alumno->id)}}" ><span class="glyphicon glyphicon-star"></span></a>

                  @foreach($certificados as $certificado)

                     @if ($alumno->id == $certificado->id_usuario && $certificado->habilitado == "SI")

                        <a href="{{$certificado->url}}" target="_blank"><span class="glyphicon glyphicon-star"></span></a>

                     @endif
                  @endforeach

                </td>
                <td><a class="btn btn-primary btn-xs" href="{{ route('usuario.show',['id' => $alumno->id]) }}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('HomeController@edit', $alumno->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                <a class="btn btn-danger btn-xs" href="{{ route('usuario.borra',['id' => $alumno->id]) }}" ><span class="glyphicon glyphicon-trash"></span></a>
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
