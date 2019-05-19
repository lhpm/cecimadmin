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
					<h3 class="panel-title">Criterio</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Criterio</label><br />
										<span>{{$criterio->criterio}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Puntos</label><br />
										<span>{{$criterio->puntos}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Fase</label><br />
										<span>{{$criterio->id_fase}}</span>
									</div>
								</div>
							</div>

							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<a href="{{ route('pregunta.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection