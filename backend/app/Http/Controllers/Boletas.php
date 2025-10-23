<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Boletas extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boletas = Boletas::all();
           return view('boletas.index', compact('boletas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boletas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'id' => 'required|integer|unique:boletas,id',
            'evento_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'precio' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
            
        ]);

        // Crear instancia del modelo
        $request = new Boletas();
        $request->evento_id = $request-> Evento_id;
        $request->localidad_id = $request-> Localidad_id;
        $request->precio = $request-> Precio;
        $request->cantidad_disponible = $request-> Cantidad_disponible;
        
       
        $request->save(); //  Guardar en BD

        return redirect()->router('boletas.index')->whit('Mensaje','Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $boletas = Boletas::findOrFail($id);
        return view('boletas.show', compact('boletas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $boletas = Boletas::findOrFail($id);
        return view('boletas.edit', compact('boletas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request = Boletas::finOrFail($id);

        $request->validate([
            'id' => 'required|integer|unique:boletas,id',
            'evento_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'precio' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
            
        ]);

        $request = new Boletas();
        $request->evento_id = $request-> Evento_id;
        $request->localidad_id = $request-> Localidad_id;
        $request->precio = $request-> Precio;
        $request->cantidad_disponible = $request-> Cantidad_disponible;
        
        $request->save(); //  Guardar en BD

        return redirect()->route('boletas.index')->with('Mensaje','Actualización de evento exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = Boletas::findOrFail($id);
            $request->delete();

            return redirect()->route('boletas.index')->with('Mensaje','Evento eliminado.');
    }
}
