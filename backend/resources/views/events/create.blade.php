@extends('layouts.app')

@section('title', isset($event) ? 'Editar evento' : 'Crear evento')

@section('content')
<div class="card">
	<div class="card-body">
		<h5 class="card-title">{{ isset($event) ? 'Editar evento' : 'Crear evento' }}</h5>

		<form method="POST" action="{{ isset($event) ? route('events.update',$event) : route('events.store') }}">
			@csrf
			@if(isset($event)) @method('PUT') @endif

			<div class="mb-3">
				<label class="form-label">Nombre</label>
				<input name="nombre" class="form-control" value="{{ old('nombre', $event->nombre ?? '') }}" minlength='3'maxlength='30' pattern='^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ-]+$' required>
			</div>

			<div class="mb-3">
				<label class="form-label">Descripción</label>
				<textarea name="descripcion" class="form-control" rows="3" minlength='3', required maxlength=>{{ old('descripcion', $event->descripcion ?? 'Escribe una breve descripcion del evento.') }}</textarea>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Fecha y hora inicio</label>
					<input type="datetime-local" name="inicio" class="form-control" value="{{ old('inicio', isset($event) ? $event->inicio->format('Y-m-d\TH:i') : '') }}" required>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Fecha y hora fin</label>
					<input type="datetime-local" name="fin" class="form-control" value="{{ old('fin', isset($event) ? $event->fin->format('Y-m-d\TH:i') : '') }}" required>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Departamento</label>
					<select name="departamento" id="departamento" >
						@foreach($departamentos as $departamento)
							<option value="{{ $departamento->nombre }}" {{ (old('departamento', isset($event) ? $event->departamento_nombre : '') == $departamento->nombre) ? 'selected' : '' }} >
								{{ $departamento->nombre }}
							</option>
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Municipio</label>
					<select name="municipio" id="municipio" >
						@foreach($municipios as $municipio)
							<option value="{{ $municipio->nombre }}" {{ (old('municipio', isset($event) ? $event->municipio_nombre : '') == $municipio->nombre) ? 'selected' : '' }}>
								{{ $municipio->nombre }}
							</option>
					</select>
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>
	</div>
</div>
@endsection
