@extends('layouts.layout')
@section('content')
<script> 
function comprobarClave(){ 
   	password = document.nuevo_usuario.password.value 
   	cpassword = document.nuevo_usuario.cpassword.value 

   	if (password == cpassword) 
      	//alert("Registro exitoso");
      return true;
   	else 
      	//alert("Las dos claves deben ser idénticas");
      document.getElementById("validacion").innerHTML = "LOS CAMPOS CLAVES DEBEN SER IDENTICOS";
      return false;
} 
</script> 
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
					<h3 class="panel-title">Nuevo Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form name="nuevo_usuario" method="POST" action="{{ route('usuario.store') }}" role="form" onsubmit= "return comprobarClave()">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Nombre:</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre usuario" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                         <label for="sel1">Tipo de documento:</label>
                                         <select class="form-control" name="tipo_documento" id="tipo_documento" required="required">
                                           <option>C.C:</option>
                                           <option>C.E</option>
                                           <option>PASAPORTE</option>
                                         </select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Número de documento:</label>
										<input type="text" name="num_documento" id="num_documento" class="form-control input-sm" placeholder="Número documento" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Fecha de Nacimiento:</label>
										<input type="date" name="fec_nac" id="fec_nac" class="form-control input-sm" required="required">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Institución:</label>
										<input type="text" name="institucion" id="institucion" class="form-control input-sm" placeholder="Institución" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Vinculación:</label>
                                         <input class="form-check-input" type="radio" name="vinculacion" id="vinculacion" value="estudiante">
                                         <label class="form-check-label" for="estudiante">Estudiante</label>
                                         <input class="form-check-input" type="radio" name="vinculacion" id="vinculacion" value="profesor">
                                         <label class="form-check-label" for="exampleRadios1">Profesor</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Asociación:</label>
										<input type="text" name="asociacion" id="asociacion" class="form-control input-sm" placeholder="Asociacion" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Correo:</label>
										<input type="text" name="correo" id="correo" class="form-control input-sm" placeholder="Correo" required="required">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Clave:</label>
										<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="usr">Confirmar Clave:</label>
										<input type="password" name="cpassword" id="cpassword" class="form-control input-sm" placeholder="Password" required="required">
									</div>
								</div>
							</div>
 							<div id="validacion" class="alert alert-warning">
                            </div>
							<div class="row">
 								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block" onClick="comprobarClave()">
									<a href="{{ route('usuario.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection