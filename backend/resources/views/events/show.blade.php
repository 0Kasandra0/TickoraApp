@extends('layouts.app')

@section('title','Detalle del evento')

@section('content')
<div class="card mb-3">
	<div class="card-body">
		<h3 class="card-title">{{ $event->nombre }}</h3>
		<p class="text-muted small">Código: {{ $event->id }}</p>
		<p>{{ $event->descripcion }}</p>
		<p><strong>Inicio:</strong> {{ $event->fecha_inicio->format('Y-m-d H:i') }} &nbsp; <strong>Fin:</strong> {{ $event->fecha_fin->format('Y-m-d H:i') }}</p>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<h5>Artistas</h5>
		<ul class="list-group">
			@forelse($event->artistas as $artista)
				<li class="list-group-item">
					{{ $artista->nombres }} {{ $artista->apellidos }} <span class="text-muted">({{ $artista->genero }}, {{ $artista->ciudad_natal }})</span>
				</li>
			@empty
				<li class="list-group-item">No hay artistas registrados.</li>
			@endforelse
		</ul>
	</div>

	<div class="col-md-6">
		<h5>Localidades y boletas</h5>
		<table class="table table-sm">
			<thead>
				<tr><th>Localidad</th><th>Precio</th><th>Disponibles</th></tr>
			</thead>
			<tbody>
				@foreach($event->boleterias as $b)
					<tr>
						<td>{{ $b->localidad->nombre ?? '—' }}</td>
						<td>${{ number_format($b->precio,0,',','.') }}</td>
						<td>{{ $b->cantidad_disponible }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
