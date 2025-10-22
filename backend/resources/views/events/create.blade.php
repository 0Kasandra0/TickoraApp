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
				<input name="nombre" class="form-control" value="{{ old('nombre', $event->nombre ?? '') }}" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Descripción</label>
				<textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $event->descripcion ?? '') }}</textarea>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Fecha y hora inicio</label>
					<input type="datetime-local" name="fecha_inicio" class="form-control" value="{{ old('fecha_inicio', isset($event) ? $event->fecha_inicio->format('Y-m-d\TH:i') : '') }}" required>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Fecha y hora fin</label>
					<input type="datetime-local" name="fecha_fin" class="form-control" value="{{ old('fecha_fin', isset($event) ? $event->fecha_fin->format('Y-m-d\TH:i') : '') }}" required>
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>
	</div>
</div>
@endsection
