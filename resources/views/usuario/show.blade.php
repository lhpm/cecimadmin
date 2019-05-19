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
					<h3 class="panel-title">Alumno</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Nombre Completo</label><br />
										<span>{{$usuario->name}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Tipo:{{$usuario->tipo_documento}}</label>
										<br /><label>Documento</label>
										<span>{{$usuario->num_documento}}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Fecha de Nacimiento</label><br />
										<span>{{date('d/m/Y', strtotime($usuario->fec_nac))}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Institución</label><br />
										<span>{{$usuario->institucion}}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Código del Estudiante</label><br />
										<span>{{$usuario->vinculacion}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Asociación</label><br />
										<span>{{$usuario->asociacion}}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Correo</label><br />
										<span>{{$usuario->email}}</span>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Pago</label><br />
										@foreach ($pagos as $pago)
										@if ($pago->pago == "")
										<span>No ha enviado comprobante de pago</span>
										@else
										<span>Si tiene comprobante de pago <a href="{{$pago->pago}}" target="_blank"><span class="glyphicon glyphicon-zoom-in">Ver</a></span>
										@endif
										@endforeach

									</div>
								</div>
							</div>

                            <h2>Trabajos</h2>

                             <table class="table" style="table-layout:fixed">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Descripción</th>
                                  <th scope="col">Comentario</th>
                                  <th scope="col" style="text-align:left;">Calificación</th>
                                </tr>
                              </thead>
                              <tbody id="myTable">

                                @foreach ($trabajos as $trabajo)

                                @if ($usuario->id == $trabajo->id_usuario)

                                <tr>
                                  <th scope="row">{{ $trabajo->id }}</th>
                                  <td>
                                    @php

                                    // Decodificador del Array JSON simple

                                    $hola = json_decode($trabajo->descripcion);

                                    print "FASE ENVIO: <b>".$hola[0]."</b><br />";

                                    print "Trabajo: <b>".$hola[1]."</b><br />";

                                    print "Foto / Video Médica: <a href=".$hola[2]." target='_blank'><span class='glyphicon glyphicon-link'></span></a><br />";

                                    print "Descripción: <span style='font-size:16px;color:grey;'><br />".$hola[3]."</span>";

                                    @endphp

                                    <br /><a href="{{$trabajo->pdf}}" target="_blank"><span class='glyphicon glyphicon-open'>Adjunto</span></span>
                                  </td>
                                  <td style="text-align:left;vertical-align:middle;">
                                  {{$trabajo->comentario}}
                                  </td>
                                  <td style="text-align:right;vertical-align:middle;">
                                    @php
                                    $arr = json_decode($trabajo->calificacion, true);

                                    $hola = json_decode($arr, true);
                                    $total_puntaje = 0;
                                    for ($i = 0; $i < count($hola["preguntas"]); $i++){
                                    print "<span style='font-size:16px;'>".$hola["puntos"][$i]." </span>";
                                    $total_puntaje = $hola["puntos"][$i] + $total_puntaje;
                                    }

                                    print "<br /><span style='font-size:16px;'>Total puntaje: ".$total_puntaje."</span><br />";


                                    @endphp
                                  </td>
                                </tr>
                                @endif
                                @endforeach

                              </tbody>
                             </table>
 
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<a href="{{ route('home') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection