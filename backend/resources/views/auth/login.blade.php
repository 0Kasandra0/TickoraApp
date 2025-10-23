@extends('layouts.app')

@section('title','Iniciar sesión')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-3">Iniciar sesión</h4>

				@if($errors->any())
					<div class="alert alert-danger">
						<ul class="mb-0">
						@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
						</ul>
					</div>
				@endif

				<form method="POST" action="{{ route('login') }}">
					@csrf

					<div class="mb-3">
						<label class="form-label">Correo electrónico</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
						@error('email') <div class="text-danger small">{{ $message }}</div> @enderror
					</div>

					<div class="mb-3">
						<label class="form-label">Contraseña</label>
						<input type="password" name="password" class="form-control" required minlength="8">
						@error('password') <div class="text-danger small">{{ $message }}</div> @enderror
					</div>

					<div class="mb-3 form-check">
						<input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="form-check-label" for="remember">Recordarme</label>
					</div>

					<button class="btn btn-primary">Entrar</button>
					<a href="{{ route('register') }}" class="btn btn-link">Registrarse</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
