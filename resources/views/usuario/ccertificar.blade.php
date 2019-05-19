@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Certificar Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Nombre completo</label>
										<span>{{$usuario->name}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Tipo documento</label>
										<span>{{$usuario->tipo_documento}}</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Número documento</label>
										<span>{{$usuario->num_documento}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Fecha nacimiento</label>
										<span>{{$usuario->fec_nac}}</span>
									</div>
								</div>
							</div>

							<form method="POST" action="{{ url("home/usuario/ccertificar/{$usuario->id}") }}" role="form" enctype="multipart/form-data">
							{{ method_field('PUT') }} <!-- CAMPO OCULTO -->
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{$usuario->id}}">

							<input type="hidden" name="id_usuario" value="{{$usuario->id}}">

							<label>Subir Certificado</label>
							<div class="alert alert-warning">
                            <strong>¡Advertencia!</strong> Cada vez que entre habilitar o deshabilitar deberá subir el Certtificado aún esté subido.
                            </div>
							<input type="file" name="url" class="form-control input-sm">

							<label>Habilitar</label>
	            @foreach($certificados as $certificado)

                     @if ($usuario->id == $certificado->id_usuario)

                        <label>Actualmente:</label>{{$certificado->habilitado}}

                     @endif
                @endforeach
							<select name="habilitado" class="form-control input-sm" required>
								<option value="">Seleccione...</option>
								<option value="SI">SI</option>
								<option value="NO">NO</option>
							</select>


							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Certificar" class="btn btn-warning btn-block">
									<a href="{{ route('home') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection