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
          <div class="pull-left"><h3>Jurado</h3><strong>Total jurados: {{$jurados->total()}}</strong></div>
          <div class="pull-right">
            <div class="btn-group">

            <a class="btn btn-primary btn-md" href="{{ route('usuario.cjurado') }}"><span class="glyphicon glyphicon-plus"></span>Registrar</a>

            <form method="GET" action="{{ route('usuario.jurado') }}" class="navbar-form pull-right"> 
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
               <th>Nombre</th>
               <th>Correo</th>
               <th>Ver</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($jurados->count())  
              @foreach($jurados as $jurado)
              <tr>
                <td>{{$jurado->name}}</td>
                <td>{{$jurado->email}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{ route('jurado.mostrar',['id' => $jurado->id]) }}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <td>
                <a class="btn btn-danger btn-xs" href="{{ route('usuario.djurado',['id' => $jurado->id]) }}" ><span class="glyphicon glyphicon-trash"></span></a>
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
      {{ $jurados->links() }}
    </div>
  </div>
</section>
 
@endsection