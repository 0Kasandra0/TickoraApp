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
				<select name="event_id" class="form-select" required @if(request('event_id')) disabled @endif>
					<option value="">-- seleccionar --</option>
					@foreach($events as $e)
						<option value="{{ $e->id }}" @selected(old('event_id', $boleteria->event_id ?? request('event_id') ?? '') == $e->id)>{{ $e->nombre }}</option>
					@endforeach
				</select>

				{{-- Si el event_id llega por query param, incluimos un input hidden para que se envíe --}}
				@if(request('event_id'))
					<input type="hidden" name="event_id" value="{{ request('event_id') }}">
				@endif
			</div>

			<div class="mb-3">
				<label class="form-label">Localidad</label>
				<select name="localidad_id" class="form-select" required>
					<option value="">-- seleccionar --</option>
					@foreach($localidades as $l)
						<option value="{{ $l->id }}" @selected(old('localidad_id', $boleteria->localidad_id ?? '') == $l->id)>{{ $l->nombre }}</option>
					@endforeach
				</select>
			</div>

			<div class="row">
				<div class="col-md-4 mb-3">
					<label class="form-label">Precio</label>
					<input name="precio" type="number" min="1" step="0.01" class="form-control" value="{{ old('precio', $boleteria->precio ?? '') }}" required>
				</div>
				<div class="col-md-4 mb-3">
					<label class="form-label">Cantidad total</label>
					<input name="cantidad_total" type="number" min="1" step="1" class="form-control" value="{{ old('cantidad_total', $boleteria->cantidad_total ?? '') }}" required>
				</div>
			</div>

			<button class="btn btn-primary">Guardar</button>
			<a href="{{ route('boleteria.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>

		{{-- Botón para crear localidades (lleva al formulario de localidades) --}}
		<div class="mt-4 mb-2">
			<a href="{{ route('localidades.create') }}" class="btn btn-success">Agregar localidad</a>
		</div>

		{{-- Listado compacto de localidades creadas --}}
		@if(isset($localidades) && count($localidades))
			<hr>
			<h5>Localidades creadas</h5>
			<div class="table-responsive localidades-list">
				<table class="table table-sm table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($localidades as $loc)
							<tr>
								<td>{{ $loc->id }}</td>
								<td>{{ $loc->nombre }}</td>
								<td>
									<a href="{{ route('localidades.edit', $loc) }}" class="btn btn-sm btn-primary">Editar</a>
									<form action="{{ route('localidades.destroy', $loc) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar localidad?');">
										@csrf @method('DELETE')
										<button class="btn btn-sm btn-danger">Eliminar</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif

	</div>
</div>
@endsection
