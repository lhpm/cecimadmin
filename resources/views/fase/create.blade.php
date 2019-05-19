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
					<h3 class="panel-title">Nueva Fase</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form name="nueva_fase" method="POST" action="{{ route('fase.index') }}" role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Título:</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Título de la fase" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="descripcion">Descripción:</label>
										<textarea name="descripcion" id="descripcion" rows="10" class="form-control rounded-0"></textarea>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="fechafin">Fecha Final:</label>
										<input type="date" name="fechafin" id="fechafin" class="form-control input-sm" placeholder="Fecha final" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="hidden" name="habilitado" id="habilitado" class="form-control input-sm" value="NO">
									</div>
								</div>
							</div>

							<div id="validacion" class="alert alert-warning">
                            </div>
							<div class="row">
 								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
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