@extends('layouts.app')

@section('title','Agregar boletería')

@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ isset($boleteria) ? route('boleteria.update',$boleteria) : route('boleteria.store') }}">
			@csrf
			@if(isset($boleteria)) @method('PUT') @endif

			<div class="mb-3">
				<label class="form-label">Evento</label>
				<select name="event_id" class="form-select @error('event_id') is-invalid @enderror" required aria-required="true">
					<option value="">-- seleccionar --</option>
					@foreach($events as $e)
						<option value="{{ $e->id }}" @selected(old('event_id', $boleteria->event_id ?? request('event_id','')) == $e->id)>{{ $e->nombre }}</option>
					@endforeach
				</select>
				@error('event_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>

			<div class="mb-3">
				<label class="form-label">Localidad</label>
				<select name="localidad_id" class="form-select @error('localidad_id') is-invalid @enderror" required aria-required="true">
					<option value="">-- seleccionar --</option>
					@foreach($localidades ?? [] as $l)
						<option value="{{ $l->id }}" @selected(old('localidad_id', $boleteria->localidad_id ?? '') == $l->id)>{{ $l->nombre }}</option>
					@endforeach
				</select>
				@error('localidad_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>

			<div class="row">
				<div class="col-md-4 mb-3">
					<label class="form-label">Precio</label>
					<input
						name="precio"
						type="number"
						min="0.01"
						step="0.01"
						inputmode="decimal"
						class="form-control @error('precio') is-invalid @enderror"
						value="{{ old('precio', $boleteria->precio ?? '') }}"
						required
						aria-describedby="precioHelp">
					<small id="precioHelp" class="form-text text-muted">Valor en moneda local, mínimo 0.01</small>
					@error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
				</div>
				<div class="col-md-4 mb-3">
					<label class="form-label">Cantidad total</label>
					<input
						name="cantidad_total"
						type="number"
						min="1"
						max="100000"
						step="1"
						inputmode="numeric"
						class="form-control @error('cantidad_total') is-invalid @enderror"
						value="{{ old('cantidad_total', $boleteria->cantidad_total ?? '') }}"
						required
						aria-describedby="cantidadHelp">
					<small id="cantidadHelp" class="form-text text-muted">Número entero, mínimo 1</small>
					@error('cantidad_total') <div class="invalid-feedback">{{ $message }}</div> @enderror
				</div>
			</div>

			<button class="btn btn-primary">Guardar</button>
			<a href="{{ route('boleteria.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>

		{{-- acción rápida para crear localidades --}}
		<div class="mt-4">
			<a href="{{ route('localidades.create') }}" class="btn btn-sm btn-outline-primary">Agregar localidad</a>
		</div>

		{{-- listado de localidades existentes (si se recibe la variable) --}}
		@if(!empty($localidades))
			<h5 class="mt-3">Localidades creadas</h5>
			<table class="table table-striped">
				<thead><tr><th>Código</th><th>Nombre</th><th>Departamento</th><th>Municipio</th></tr></thead>
				<tbody>
					@foreach($localidades as $loc)
						<tr>
							<td>{{ $loc->codigo ?? '-' }}</td>
							<td>{{ $loc->nombre }}</td>
							<td>{{ $loc->departamento ?? '-' }}</td>
							<td>{{ $loc->municipio ?? '-' }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
	// Normalizar precio a 2 decimales y cantidad como entero antes de enviar
	const form = document.querySelector('form');
	const precioEl = form.querySelector('input[name="precio"]');
	const cantidadEl = form.querySelector('input[name="cantidad_total"]');

	if (precioEl) {
		precioEl.addEventListener('blur', function(){
			let v = parseFloat(this.value);
			if (!isNaN(v)) this.value = v.toFixed(2);
		});
	}

	if (cantidadEl) {
		cantidadEl.addEventListener('blur', function(){
			let v = parseInt(this.value, 10);
			if (isNaN(v) || v < 1) v = 1;
			this.value = v;
		});
	}

	form.addEventListener('submit', function(e){
		// simple check to prevent submission if native validation fails
		if (!form.checkValidity()) {
			// let browser show validation UI
			return;
		}
		// ensure precio formatting
		if (precioEl && precioEl.value !== '') {
			const v = parseFloat(precioEl.value);
			if (!isNaN(v)) precioEl.value = v.toFixed(2);
		}
	});
});
</script>
@endsection
