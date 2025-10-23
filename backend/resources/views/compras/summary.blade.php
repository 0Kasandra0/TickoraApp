@extends('layouts.app')

@section('title','Resumen de compra')

@section('content')
<div class="card">
	<div class="card-body">
		<h4>Resumen de compra</h4>

		<p><strong>Evento:</strong> {{ $purchase->event->nombre ?? '' }}</p>
		<p><strong>Localidad:</strong> {{ $purchase->localidad->nombre ?? '' }}</p>
		<p><strong>Cantidad:</strong> {{ $purchase->cantidad }}</p>
		<p><strong>Valor total:</strong> {{ $purchase->valor_total }}</p>
		<p><strong>Método:</strong> {{ $purchase->metodo_pago }}</p>
		<p><strong>Estado transacción:</strong> {{ $purchase->estado_transaccion ?? 'pendiente' }}</p>

		<a href="{{ route('purchases.history') }}" class="btn btn-secondary">Volver al historial</a>
	</div>
</div>
@endsection
