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
					<h3 class="panel-title">Nuevo Criterio</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form name="nuevo_criterio" method="POST" action="{{ route('pregunta.index') }}" role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Criterio:</label>
										<input type="text" name="criterio" id="criterio" class="form-control input-sm" placeholder="Criterio" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Puntos:</label>
										<input type="text" name="puntos" id="puntos" class="form-control input-sm" placeholder="5" required="required">
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="usr">Seleccionar Fase:</label>
									    <select class="form-control" name="id_fase" id="id_fase">
						                <option value="">Seleccionar Fase</option>
					                    @foreach($fases as $fase)
						                <option value="{{ $fase->id }}">{{ $fase->nombre }}</option>
					                    @endforeach
					                    </select>
								</div>
							</div>

							<div id="validacion" class="alert alert-warning">
                            </div>
							<div class="row">
 								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('pregunta.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection