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
          <div class="pull-left"><h3>Registrados</h3><strong>Total alumnos: {{$alumnos->count()}}</strong> | Fecha de emisión: {{date("d-m-Y \- h:i:s:a", time())}}</div>
          <div class="pull-right">
            <div class="btn-group">

            <form method="GET" action="{{ route('home') }}" class="navbar-form pull-right"> 
              <div class="input-group"> 

              </div> 
            </form>

            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Código</th>
               <th>Nombre</th>
               <th>Correo</th>
               <th>Asociación</th>
               <th>Registro</th>
             </thead>
             <tbody>
              @if($alumnos->count())
              @foreach($alumnos as $alumno)
              <tr>
                <td>{{$alumno->vinculacion}}</td>
                <td>{{$alumno->name}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{$alumno->asociacion}}</td>
                <td>{{date("d-m-Y", strtotime($alumno->created_at))}}</td>

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
    </div>
  </div>
</section>
 
@endsection
