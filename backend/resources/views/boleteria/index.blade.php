@extends('layouts.app')

@section('title','Boletería')

@section('content')
<div class="d-flex justify-content-between mb-3">
	<h1 class="h4">Boletería</h1>
	<a href="{{ route('boleteria.create') }}" class="btn btn-primary btn-sm">Agregar boletas</a>
</div>

<table class="table table-hover">
	<thead class="table-light">
		<tr><th>Evento</th><th>Localidad</th><th>Precio</th><th>Disponibles</th><th>Acciones</th></tr>
	</thead>
	<tbody>
	@foreach($boleterias as $b)
		<tr>
			<td>{{ $b->event->nombre ?? '—' }}</td>
			<td>{{ $b->localidad->nombre ?? '—' }}</td>
			<td>${{ number_format($b->precio,0,',','.') }}</td>
			<td>{{ $b->cantidad_disponible }}</td>
			<td>
				<a href="{{ route('boleteria.edit',$b) }}" class="btn btn-sm btn-outline-warning">Editar</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
