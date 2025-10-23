@extends('layouts.app')

@section('title','Localidades')

@section('content')
<div class="d-flex justify-content-between mb-3">
	<h3>Localidades</h3>
	<a href="{{ route('localidades.create') }}" class="btn btn-primary">Agregar localidad</a>
</div>

<table class="table">
	<thead><tr><th>Código</th><th>Nombre</th><th>Departamento</th><th>Municipio</th><th>Acciones</th></tr></thead>
	<tbody>
		@foreach($localidades as $l)
			<tr>
				<td>{{ $l->codigo ?? '-' }}</td>
				<td>{{ $l->nombre }}</td>
				<td>{{ $l->departamento ?? '-' }}</td>
				<td>{{ $l->municipio ?? '-' }}</td>
				<td>
					<a href="{{ route('localidades.edit',$l) }}" class="btn btn-sm btn-secondary">Editar</a>
					<form method="POST" action="{{ route('localidades.destroy',$l) }}" class="d-inline">@csrf @method('DELETE')
						<button class="btn btn-sm btn-danger">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
