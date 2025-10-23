@extends('layouts.app')

@section('title','Crear localidad')

@section('content')
<div class="card">
	<div class="card-body">
		<form method="POST" action="{{ route('localidades.store') }}">
			@csrf
			<div class="mb-3">
				<label class="form-label">Código localidad</label>
				<input name="codigo" class="form-control" value="{{ old('codigo') }}" required pattern="[A-Za-z0-9\-]{1,20}">
				@error('codigo') <div class="text-danger small">{{ $message }}</div> @enderror
			</div>

			<div class="mb-3">
				<label class="form-label">Nombre localidad</label>
				<input name="nombre" class="form-control" value="{{ old('nombre') }}" required minlength="2" maxlength="150">
				@error('nombre') <div class="text-danger small">{{ $message }}</div> @enderror
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Departamento</label>
					<select id="departamento" name="departamento" class="form-select" required>
						<option value="">-- seleccionar --</option>
					</select>
					@error('departamento') <div class="text-danger small">{{ $message }}</div> @enderror
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Municipio / Ciudad</label>
					<select id="municipio" name="municipio" class="form-select" required>
						<option value="">-- seleccionar --</option>
					</select>
					@error('municipio') <div class="text-danger small">{{ $message }}</div> @enderror
				</div>
			</div>

			<button class="btn btn-primary">Guardar</button>
			<a href="{{ route('localidades.index') }}" class="btn btn-secondary">Cancelar</a>
		</form>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
	if (typeof loadDepartamentos === 'function') {
		loadDepartamentos('#departamento');
		document.querySelector('#departamento').addEventListener('change', function(){
			loadMunicipios('#departamento','#municipio');
		});
	}
});
</script>
@endsection
