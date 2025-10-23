@extends('layouts.app')

@section('title','Registrarse')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-3">Crear cuenta</h4>

				<form method="POST" action="{{ route('register') }}">
					@csrf

					<div class="row">
						<div class="col-md-6 mb-3">
							<label class="form-label">Nombres</label>
							<input name="nombres" class="form-control" value="{{ old('nombres') }}" required minlength="2" maxlength="100">
							@error('nombres') <div class="text-danger small">{{ $message }}</div> @enderror
						</div>
						<div class="col-md-6 mb-3">
							<label class="form-label">Apellidos</label>
							<input name="apellidos" class="form-control" value="{{ old('apellidos') }}" required minlength="2" maxlength="100">
							@error('apellidos') <div class="text-danger small">{{ $message }}</div> @enderror
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label class="form-label">Tipo de documento</label>
							<select name="tipo_documento" class="form-select" required>
								<option value="">-- seleccionar --</option>
								<option value="CC" @selected(old('tipo_documento')=='CC')>Cédula</option>
								<option value="CE" @selected(old('tipo_documento')=='CE')>Cédula extranjería</option>
                                <option value="PA" @selected(old('tipo_documento')=='PA')>Pasaporte</option>
							</select>
							@error('tipo_documento') <div class="text-danger small">{{ $message }}</div> @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label class="form-label">Número de documento</label>
							<input name="numero_documento" class="form-control" value="{{ old('numero_documento') }}" required pattern="\d{5,20}">
							@error('numero_documento') <div class="text-danger small">{{ $message }}</div> @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label class="form-label">Teléfono (opcional)</label>
							<input name="telefono" class="form-control" value="{{ old('telefono') }}" pattern="[0-9\+\-\s]{6,20}">
							@error('telefono') <div class="text-danger small">{{ $message }}</div> @enderror
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label">Correo electrónico</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
						@error('email') <div class="text-danger small">{{ $message }}</div> @enderror
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label class="form-label">Contraseña</label>
							<input type="password" name="password" class="form-control" required minlength="8">
							@error('password') <div class="text-danger small">{{ $message }}</div> @enderror
						</div>
						<div class="col-md-6 mb-3">
							<label class="form-label">Confirmar contraseña</label>
							<input type="password" name="password_confirmation" class="form-control" required minlength="8">
						</div>
					</div>

					<button class="btn btn-primary">Registrarse</button>
					<a href="{{ route('login') }}" class="btn btn-link">¿Ya tienes cuenta? Iniciar sesión</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
