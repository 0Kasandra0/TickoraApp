<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Eventos;

Route::get('/', function () {
    return view('welcome');
});

Route::get('eventos', Eventos::class, 'index');
Route::get('evens/create' Eventos::class, 'create');