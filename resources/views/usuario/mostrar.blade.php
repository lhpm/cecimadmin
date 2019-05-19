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
					<h3 class="panel-title">Datos Jurado</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action=""  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Nombre Completo</label><br />
										<span>{{$jurado->name}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Tipo:
										{{$jurado->tipo_documento}}</label><br />
										<label>Documento:</label>
										<span>{{$jurado->num_documento}}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Fecha de Nacimiento</label><br />
										<span>{{date('d/m/Y', strtotime($jurado->fec_nac))}}</span>
										
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Institución</label><br />
										<span>{{$jurado->institucion}}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Vinculación</label><br />
										<span>{{$jurado->vinculacion}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Asociación</label><br />
										<span>{{$jurado->asociacion}}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Correo</label><br />
										<span>{{$jurado->email}}</span>
									</div>
								</div>
							</div>


							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<a href="{{ route('usuario.jurado') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection