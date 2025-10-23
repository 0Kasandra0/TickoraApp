@extends('layouts.app')

@section('title','Tickora - Inicio')

@section('content')
<?php
$dbFile = database_path('database.sqlite');
$missing = ! file_exists($dbFile);
?>
@if($missing)
	<div class="card border-danger">
		<div class="card-body">
			<h4 class="card-title text-danger">Base de datos no encontrada</h4>
			<p>El archivo sqlite esperado no existe en:</p>
			<pre>{{ $dbFile }}</pre>
			<p>Para solucionarlo, desde la raíz del proyecto (o la ruta indicada) ejecuta:</p>
			<pre>
# crear archivo sqlite (Windows - PowerShell / CMD)
type NUL > backend\database\database.sqlite

# o en Linux / Git Bash / WSL
touch backend/database/database.sqlite

# luego dar permisos (si aplica) y ejecutar migraciones
php artisan migrate
			</pre>

			<p>Si usas .env con DB_CONNECTION=sqlite, asegúrate que DB_DATABASE apunta al archivo correcto. Alternativamente, configura tu conexión a MySQL/Postgres en .env.</p>

			<p class="text-muted small">Nota: si la aplicación intenta conectarse al DB antes de renderizar la vista (p. ej. en proveedores), puede seguir mostrando errores. Crea el archivo sqlite y ejecuta las migraciones antes de acceder de nuevo.</p>
		</div>
	</div>
@else
	{{-- ...existing landing content (listado de eventos, filtros, etc.)... --}}
	{{-- Mantengo el contenido actual de la landing aquí. --}}
@endif
@endsection
