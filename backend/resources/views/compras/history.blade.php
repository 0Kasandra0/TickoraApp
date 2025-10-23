@extends('layouts.app')

@section('title','Historial de compras')

@section('content')
<h3>Historial de compras</h3>

<table class="table">
	<thead>
		<tr><th>Evento</th><th>Localidad</th><th>Cantidad</th><th>Valor total</th><th>Fecha</th><th>Estado</th></tr>
	</thead>
	<tbody>
		@foreach($purchases as $p)
			<tr>
				<td>{{ $p->event->nombre ?? '' }}</td>
				<td>{{ $p->localidad->nombre ?? '' }}</td>
				<td>{{ $p->cantidad }}</td>
				<td>{{ $p->valor_total }}</td>
				<td>{{ $p->created_at }}</td>
				<td>{{ $p->estado_transaccion }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
