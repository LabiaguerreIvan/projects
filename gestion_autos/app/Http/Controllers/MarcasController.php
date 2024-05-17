<?php

namespace App\Http\Controllers;

use App\Models\autos;
use App\Models\marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = marcas::orderBy('id', 'desc')->paginate(3);
        return view('marcas/inicioMarcas', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas/agregarMarcas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marcas = new marcas();
        $marcas->nombre_marca = $request->post('nombre_marca');
        $marcas->lugar_fabrica = $request->post('lugar_fabrica');
        $marcas->fecha_fabricacion = $request->post('fecha_fabricacion');
        $marcas->save();

        return redirect()->route("marcas.index")->with("success", "Se agregó una marca con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $marcas = marcas::find($id);
        return view('marcas/eliminarMarcas', compact('marcas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $marcas = marcas::find($id);
        return view("marcas/editarMarcas", compact('marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $marcas = marcas::find($id);
        $marcas->nombre_marca = $request->post('nombre_marca');
        $marcas->lugar_fabrica = $request->post('lugar_fabrica');
        $marcas->fecha_fabricacion = $request->post('fecha_fabricacion');
        $marcas->save();

        return redirect()->route("marcas.index")->with("success", "Registro actualizado con éxito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marcas = marcas::find($id);
        $marcas->delete();

        return redirect()->route('marcas.index')->with("success","Registro eliminado con éxito");
    }

    public function autos()
    {
        return $this->hasMany(autos::class, 'marcas_id_marca');
    }
}
