@extends('layouts.app')

@section('title','Comprar boletas')

@section('content')
<div class="card">
	<div class="card-body">
		<h4>Comprar: {{ $event->nombre ?? 'Evento' }}</h4>

		<form method="POST" action="{{ route('purchases.store') }}">
			@csrf
			<input type="hidden" name="event_id" value="{{ $event->id ?? '' }}">

			<div class="mb-3">
				<label>Localidad</label>
				<select name="localidad_id" class="form-select" required>
					<option value="">-- seleccionar --</option>
					@foreach($boleterias as $b)
						<option value="{{ $b->localidad->id }}" data-disponibles="{{ $b->cantidad_total }}">{{ $b->localidad->nombre }} - Disponibles: {{ $b->cantidad_total }} - ${{ $b->precio }}</option>
					@endforeach
				</select>
			</div>

			<div class="row">
				<div class="col-md-4 mb-3">
					<label>Cantidad (máx 10)</label>
					<input type="number" name="cantidad" class="form-control" min="1" max="10" value="1" required>
				</div>
				<div class="col-md-4 mb-3">
					<label>Método de pago (número tarjeta de prueba 15 dígitos)</label>
					<input type="text" name="metodo_pago" class="form-control" pattern="\d{15}" inputmode="numeric" required>
				</div>
			</div>

			<button class="btn btn-primary">Continuar</button>
			<a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
		</form>
	</div>
</div>
@endsection
