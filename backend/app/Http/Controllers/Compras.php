<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Compras extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compras::all();
           return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'id' => 'required|integer|unique:compras,id',
            'usuario_id' => 'required|integer',
            'numero_documento_comprador' => 'required|integer',
            'evento_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'cantidad_boletas' => 'required|integer',
            'valor_total' => 'required|numeric',
            'metodo_pago' => 'required|integer',
            'estado' => 'required|string|max:255'
        ]);

        // Crear instancia del modelo
        $request = new Compras();
        $request->usuario_id = $request-> Evento_id;
        $request->numero_documento_comprador = $request-> Localidad_id;
        $request->evento_id = $request-> Precio;
        $request->localidad_id = $request-> Cantidad_disponible;
        $request->cantidad_boletas = $request-> Cantidad_boletas;
        $request->valor_total = $request-> Valor_total;
        $request->metodo_pago = $request-> Metodo_pago;
        $request->estado = $request-> Estado;

        $request->save(); //  Guardar en BD

        return redirect()->route('compras.index')->with('Mensaje','Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compras = Compras::findOrFail($id);
        return view('compras.show', compact('compras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $compras = Compras::findOrFail($id);
        return view('compras.edit', compact('compras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request = Compras::finOrFail($id);

        $request->validate([
            'id' => 'required|integer|unique:compras,id',
            'usuario_id' => 'required|integer',
            'numero_documento_comprador' => 'required|integer',
            'evento_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'cantidad_boletas' => 'required|integer',
            'valor_total' => 'required|numeric',
            'metodo_pago' => 'required|integer',
            'estado' => 'required|string|max:255'
        ]);

        $request = new Compras();
        $request->usuario_id = $request-> Evento_id;
        $request->numero_documento_comprador = $request-> Localidad_id;
        $request->evento_id = $request-> Precio;
        $request->localidad_id = $request-> Cantidad_disponible;
        $request->cantidad_boletas = $request-> Cantidad_boletas;
        $request->valor_total = $request-> Valor_total;
        $request->metodo_pago = $request-> Metodo_pago;
        $request->estado = $request-> Estado;
        $request->save(); //  Guardar en BD

        return redirect()->route('compras.index')->with('Mensaje','Actualización de evento exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = Compras::findOrFail($id);
            $request->delete();

            return redirect()->route('compras.index')->with('Mensaje','Evento eliminado.');
    }
}
