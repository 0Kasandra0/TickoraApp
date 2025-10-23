@extends('layouts.app')

@section('title', isset($user)?'Editar usuario':'Crear usuario')

@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ isset($user) ? route('users.update',$user) : route('users.store') }}">
			@csrf
			@if(isset($user)) @method('PUT') @endif

			<div class="row">
				<div class="col-md-6 mb-3">
					<label>Nombres</label>
					<input name="nombres" class="form-control" value="{{ old('nombres',$user->nombres ?? '') }}" required>
				</div>
				<div class="col-md-6 mb-3">
					<label>Apellidos</label>
					<input name="apellidos" class="form-control" value="{{ old('apellidos',$user->apellidos ?? '') }}" required>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 mb-3">
					<label>Tipo de documento</label>
					<select name="tipo_documento" class="form-select" required>
						<option value="">-- seleccionar --</option>
						<option value="CC" @selected(old('tipo_documento',$user->tipo_documento ?? '')=='CC')>Cédula</option>
						<option value="TI" @selected(old('tipo_documento',$user->tipo_documento ?? '')=='TI')>Tarjeta identidad</option>
					</select>
				</div>
				<div class="col-md-4 mb-3">
					<label>Número de documento</label>
					<input name="numero_documento" class="form-control" value="{{ old('numero_documento',$user->numero_documento ?? '') }}" required>
				</div>
				<div class="col-md-4 mb-3">
					<label>Teléfono (opcional)</label>
					<input name="telefono" class="form-control" value="{{ old('telefono',$user->telefono ?? '') }}">
				</div>
			</div>

			<div class="mb-3">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="{{ old('email',$user->email ?? '') }}" required>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label>Contraseña</label>
					<input type="password" name="password" class="form-control" @unless(isset($user)) required @endunless>
				</div>
				<div class="col-md-6 mb-3">
					<label>Confirmar contraseña</label>
					<input type="password" name="password_confirmation" class="form-control" @unless(isset($user)) required @endunless>
				</div>
			</div>

			<button class="btn btn-primary">Guardar</button>
			<a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>
	</div>
</div>
@endsection
