@extends('layouts.app')

@section('title','Artistas')

@section('content')
<div class="d-flex justify-content-between mb-3">
	<h1 class="h4">Artistas</h1>
	<a href="{{ route('artistas.create') }}" class="btn btn-primary btn-sm">Nuevo artista</a>
</div>

<table class="table table-striped">
	<thead><tr><th>Código</th><th>Nombre</th><th>Género</th><th>Ciudad</th><th>Acciones</th></tr></thead>
	<tbody>
	@foreach($artistas as $a)
		<tr>
			<td>{{ $a->id }}</td>
			<td>{{ $a->nombres }} {{ $a->apellidos }}</td>
			<td>{{ $a->genero }}</td>
			<td>{{ $a->ciudad_natal }}</td>
			<td>
				<a href="{{ route('artistas.edit',$a) }}" class="btn btn-sm btn-outline-warning">Editar</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
