@extends('layouts.app')

@section('title','Eventos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3">Eventos</h1>
	<a href="{{ route('events.create') }}" class="btn btn-primary">Nuevo evento</a>
</div>

<table class="table table-striped table-hover">
	<thead class="table-light">
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	@foreach($events as $event)
		<tr>
			<td>{{ $event->id }}</td>
			<td>{{ $event->nombre }}</td>
			<td>{{ Str::limit($event->descripcion,80) }}</td>
			<td>{{ $event->fecha_inicio->format('Y-m-d H:i') }}</td>
			<td>{{ $event->fecha_fin->format('Y-m-d H:i') }}</td>
			<td>
				<a href="{{ route('events.show',$event) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
				<a href="{{ route('events.edit',$event) }}" class="btn btn-sm btn-outline-warning">Editar</a>
				<a href="{{ route('boleteria.create', ['event_id'=>$event->id]) }}" class="btn btn-sm btn-outline-success">Boletería</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

{{ $events->links() ?? '' }}
@endsection
