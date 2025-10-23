<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
** Eventos **
*/
Route::get('/eventos', 'App\Http\Controllers\Eventos@index');
Route::get('/eventos/create', 'App\Http\Controllers\Eventos@create');
Route::post('/eventos', 'App\Http\Controllers\Eventos@store');
Route::get('/eventos/{id}', 'App\Http\Controllers\Eventos@show');

/*
** Localidades **
*/
Route::get('/localidades', 'App\Http\Controllers\Localidades@index');
Route::get('/localidades/create', 'App\Http\Controllers\Localidades@create');
Route::post('/localidades', 'App\Http\Controllers\Localidades@store');
Route::get('/localidades/{id}', 'App\Http\Controllers\Localidades@show');

