@extends('layouts.app')

@section('title','Usuarios')

@section('content')
<div class="d-flex justify-content-between mb-3">
	<h3>Usuarios</h3>
	<a href="{{ route('users.create') }}" class="btn btn-primary">Agregar usuario</a>
</div>

<table class="table">
	<thead><tr><th>ID</th><th>Nombre</th><th>Documento</th><th>Email</th><th>Acciones</th></tr></thead>
	<tbody>
		@foreach($users as $u)
			<tr>
				<td>{{ $u->id }}</td>
				<td>{{ $u->nombres }} {{ $u->apellidos ?? '' }}</td>
				<td>{{ $u->tipo_documento ?? '' }} {{ $u->numero_documento ?? '' }}</td>
				<td>{{ $u->email }}</td>
				<td>
					<a href="{{ route('users.edit',$u) }}" class="btn btn-sm btn-secondary">Editar</a>
					<form method="POST" action="{{ route('users.destroy',$u) }}" class="d-inline">@csrf @method('DELETE')
						<button class="btn btn-sm btn-danger">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
