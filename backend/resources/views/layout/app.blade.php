<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield('title','Tickora')</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ url('/') }}">Tickora</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav ms-auto">
					@guest
						<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
					@else
						<li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Mi panel</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('purchases.history') }}">Historial compras</a></li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}"
							   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
						</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<aside class="col-md-2 p-3 bg-light">
				<ul class="nav flex-column">
					<li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">Eventos</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('boleteria.index') }}">Boletería</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('artists.index') }}">Artistas</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('localidades.index') }}">Localidades</a></li>
				</ul>
			</aside>

			<main class="col-md-10 p-4">
				@yield('content')
			</main>
		</div>
	</div>
</body>
</html>
