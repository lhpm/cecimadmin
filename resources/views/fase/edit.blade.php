@extends('layouts.layout')
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
					<h3 class="panel-title">Editar Fase</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ url("fase/{$fase->id}/edit") }}"  role="form">
							{{ method_field('PUT') }} <!-- CAMPO OCULTO -->
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Título</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$fase->nombre}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Fecha Final</label>
										<input type="date" name="fechafin" id="fechafin" class="form-control input-sm" value="{{$fase->fechafin}}">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										 <label for="descripcion">Descripcion</label>
										<textarea name="descripcion" id="descripcion" rows="10" class="form-control rounded-0">{{$fase->descripcion}}</textarea>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Habilitado</label>
										<select name="habilitado" id="habilitado" class="form-control" required>
											<option value="">Seleccionar</option>
											<option value="SI">SI</option>
											<option value="NO">NO</option>
										</select>
									</div>
								</div>
							</div>
 
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('fase.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection