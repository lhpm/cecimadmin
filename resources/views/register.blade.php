@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo_documento') ? ' has-error' : '' }}">
                            <label for="tipo_documento" class="col-md-4 control-label">Tipo Documento</label>

                            <div class="col-md-6">
                                <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                                  <option value="">Elegir</option>
                                  <option value="CC">Cédula Ciudadanía</option>
                                  <option value="CE">Cédula Extranjería</option>
                                  <option value="PASAPORTE">Pasaporte</option>
                                  <option value="Otro">Otro</option>
                                </select>

                                @if ($errors->has('tipo_documento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_documento') ? ' has-error' : '' }}">
                            <label for="num_documento" class="col-md-4 control-label">Número Documento</label>

                            <div class="col-md-6">
                                <input id="num_documento" type="text" class="form-control" name="num_documento" value="{{ old('num_documento') }}" required autofocus>

                                @if ($errors->has('num_documento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fec_nac') ? ' has-error' : '' }}">
                            <label for="fec_nac" class="col-md-4 control-label">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fec_nac" type="date" class="form-control" name="fec_nac" value="{{ old('fec_nac') }}" required autofocus>

                                @if ($errors->has('fec_nac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_nac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('institucion') ? ' has-error' : '' }}">
                            <label for="institucion" class="col-md-4 control-label">Institución</label>

                            <div class="col-md-6">
                                <input id="institucion" type="text" class="form-control" name="institucion" value="{{ old('institucion') }}" required autofocus>

                                @if ($errors->has('institucion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institucion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vinculacion') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input id="vinculacion" type="hidden" class="form-control" name="vinculacion" value="Profesor">

                                @if ($errors->has('vinculacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vinculacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('asociacion') ? ' has-error' : '' }}">
                            <!--
                            <label for="asociacion" class="col-md-4 control-label">Asocionación</label>-->

                            <div class="col-md-6">
                                <input id="asociacion" type="hidden" class="form-control" name="asociacion" value="{{ old('asociacion') }}">

                                @if ($errors->has('asociacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asociacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
