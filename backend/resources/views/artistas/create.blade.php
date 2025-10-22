@extends('layouts.app')

@section('title','Crear artista')

@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ isset($artista) ? route('artistas.update',$artista) : route('artistas.store') }}">
			@csrf
			@if(isset($artista)) @method('PUT') @endif

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Nombres</label>
					<input name="nombres" class="form-control" value="{{ old('nombres', $artista->nombres ?? '') }}" minlength='3'maxlength='30' pattern='^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ-]+$' required>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Apellidos</label>
					<input name="apellidos" class="form-control" value="{{ old('apellidos', $artista->apellidos ?? '') }}"  minlength='3'maxlength='30' pattern='^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ-]+$' required>
				</div>
			</div>

			<div class="mb-3">
				<label class="form-label">Género</label>
				<input name="genero_musica" class="form-control" value="{{ old('genero_musica', $artista->genero_musica ?? '') }}" minlength='3'maxlength='30' pattern='^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ-]+$' required>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Departamento</label>
					<select name="departamento" id="departamento" minlength='3'maxlength='30' pattern='^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ-]+$'>
						@foreach($departamentos as $departamento)
							<option value="{{ $departamento->nombre }}" {{ (old('departamento', isset($event) ? $event->departamento_nombre : '') == $departamento->nombre) ? 'selected' : '' }} >
								{{ $departamento->nombre }}
							</option>
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Municipio</label>
					<select name="municipio" id="municipio" minlength='3'maxlength='30' pattern='^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ-]+$'>
						@foreach($municipios as $municipio)
							<option value="{{ $municipio->nombre }}" {{ (old('municipio', isset($event) ? $event->municipio_nombre : '') == $municipio->nombre) ? 'selected' : '' }}>
								{{ $municipio->nombre }}
							</option>
					</select>
				</div>
			</div>

			<button class="btn btn-primary">Guardar</button>
			<a href="{{ route('artistas.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>
	</div>
</div>
@endsection
