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
					<h3 class="panel-title">Edición Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ url("usuario/{$usuario->id}/edit") }}"  role="form">
							{{ method_field('PUT') }} <!-- CAMPO OCULTO -->
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Nombre completo</label>
										<input type="text" name="name" id="name" class="form-control input-sm" value="{{$usuario->name}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Tipo documento</label>
										<input type="text" name="tipo_documento" id="tipo_documento" class="form-control input-sm" value="{{$usuario->tipo_documento}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Número documento</label>
										<input type="text" name="num_documento" id="num_documento" class="form-control input-sm" value="{{$usuario->num_documento}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Fecha nacimiento</label>
										<input type="date" name="fec_nac" id="fec_nac" class="form-control input-sm" value="{{$usuario->fec_nac}}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Institución</label>
										<input type="text" name="institucion" id="institucion" class="form-control input-sm" value="{{$usuario->institucion}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Vinculación</label>
										<input type="text" name="vinculacion" id="vinculacion" class="form-control input-sm" value="{{$usuario->vinculacion}}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Asociación</label>
										<input type="text" name="asociacion" id="asociacion" class="form-control input-sm" value="{{$usuario->asociacion}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Correo</label>
										<input type="text" name="email" id="email" class="form-control input-sm" value="{{$usuario->email}}">
									</div>
								</div>
							</div>
 
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
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