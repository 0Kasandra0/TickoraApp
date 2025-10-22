<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Eventos extends Controller
{
    //mostrar todos los registros eventos

    public function index()
    {
           $eventos = Eventos::all();
           return view('events.index', compact('eventos'));
    }


    // mostrar formulario de eventos
    public function create()
    {
      return view('events.create');
    }

    //guardar registro de eventos

    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'id' => 'required|integer|unique:eventos,id',
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:300',
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio',
            'municipio' => 'required|string|max:100',
        ]);

        // Crear instancia del modelo
        $request = new Eventos();
        $request->nombre = $request-> Nombre;
        $request->descripcion = $request-> Descripción;
        $request->inicio = $request-> Inicio;
        $request->fin = $request-> Fin;
        $request->departamento = $request-> Depertamento;
        $request->municipio = $request-> Municipio;
        $request->save(); //  Guardar en BD

        return redirect()->router('events.index')->whit('Mensaje','Evento creado correctamente');

    }


    // Mostrar un solo registro

    public function show(string $id)
    {
        $eventos = Eventos::findOrFail($id);
        return view('events.show', compact('eventos'));

    }

    // mostrar formulari de edición

    public function edit(string $id)
    {
         $eventos = Eventos::findOrFail($id);
        return view('events.edit', compact('eventos'));
    }

    // actualizar un evento existente 

    public function update(Request $request, string $id)
    {
        $request = Eventos::finOrFail($id);

        $request->validate([
            'id' => 'required|integer|unique:eventos,id',
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:300',
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio',
            'municipio' => 'required|string|max:100',
        ]);

        $request = new Eventos();
        $request->nombre = $request-> Nombre;
        $request->descripcion = $request-> Descripción;
        $request->inicio = $request-> Inicio;
        $request->fin = $request-> Fin;
        $request->departamento = $request-> Depertamento;
        $request->municipio = $request-> Municipio;
        $request->save(); //  Guardar en BD

        return redirect()->router('events.index')->whit('Mensaje','Actualización de evento exitosa');
    }

    // eliminar un evento
    
    public function destroy(string $id)
    {
        $request = Eventos::FinOrFail($id);
            $request->delete();

            return redirect()->router('events.index')->whit('Mensaje','Evento elmininado.');
        }
    }

