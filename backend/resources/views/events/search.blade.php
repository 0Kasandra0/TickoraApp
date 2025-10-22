@extends('layouts.app')

@section('title','Buscar eventos')

@section('content')
<div class="card mb-3">
	<div class="card-body">
		<form method="GET" action="{{ route('events.search') }}">
			<div class="row g-2">
				<div class="col-md-3">
					<label class="form-label">Fecha</label>
					<input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
				</div>
				<div class="col-md-4">
					<label class="form-label">Municipio</label>
					<input name="municipio" class="form-control" value="{{ request('municipio') }}">
				</div>
				<div class="col-md-4">
					<label class="form-label">Departamento</label>
					<input name="departamento" class="form-control" value="{{ request('departamento') }}">
				</div>
				<div class="col-md-1 d-flex align-items-end">
					<button class="btn btn-primary w-100">Buscar</button>
				</div>
			</div>
		</form>
	</div>
</div>

@if(isset($results))
	<h5>Resultados ({{ $results->count() }})</h5>
	@foreach($results as $event)
		<div class="card mb-2">
			<div class="card-body">
				<div class="d-flex justify-content-between">
					<div>
						<h6 class="mb-1">{{ $event->nombre }}</h6>
						<p class="mb-1 small text-muted">{{ Str::limit($event->descripcion,120) }}</p>
						<p class="mb-0 small"><strong>Inicio:</strong> {{ $event->fecha_inicio->format('Y-m-d H:i') }}</p>
					</div>
					<div class="text-end">
						<a href="{{ route('events.show',$event) }}" class="btn btn-sm btn-outline-primary">Ver detalles</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endif
@endsection
