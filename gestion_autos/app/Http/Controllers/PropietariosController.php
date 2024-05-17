<?php

namespace App\Http\Controllers;

use App\Models\autos;
use App\Models\propietarios;
use Illuminate\Http\Request;

class PropietariosController extends Controller
{
    //relacion
    public function autos()
    {
        return $this->hasMany(autos::class, 'propietarios_id_propietario');
    }

    public function index()
    {
        $datos = propietarios::orderBy('id', 'desc')->paginate(3);
        return view('inicio', compact('datos'));
    }

    public function create()
    {
        return view('propietarios/agregarPropietarios');
    }


    public function store(Request $request)
    {
        //guarda datos en la BDD
        $propietarios = new propietarios();
        $propietarios->nombre = $request->post('nombre');
        $propietarios->apellido = $request->post('apellido');
        $propietarios->dni = $request->post('dni');
        $propietarios->cuil = $request->post('cuil');
        $propietarios->telefono = $request->post('telefono');
        $propietarios->correo = $request->post('correo');
        $propietarios->save();
        

        return redirect()->route("propietarios.index")->with("success", "Se agregó un propietario con éxito");
    }

    public function show($id)
    {
        //muestra una alerta
        $propietarios = propietarios::find($id);
        return view('propietarios/eliminarPropietarios', compact('propietarios'));

    }

    public function edit($id)
    {
    //trae los datos que se van a editar y los carga en un formulario
    $propietarios = propietarios::find($id);
    return view("propietarios/editarPropietarios", compact('propietarios'));
}

    public function update(Request $request, $id)
    {
        //actualiza los datos en la BDD
        $propietarios = propietarios::find($id);
        $propietarios->nombre = $request->post('nombre');
        $propietarios->apellido = $request->post('apellido');
        $propietarios->dni = $request->post('dni');
        $propietarios->cuil = $request->post('cuil');
        $propietarios->telefono = $request->post('telefono');
        $propietarios->correo = $request->post('correo');
        $propietarios ->save();
        return redirect()->route('propietarios.index')->with("success", "Registro Actualizado con exito");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //elimina un registro
        $propietarios = propietarios::find($id);
        $propietarios->delete();
        return redirect()->route('propietarios.index')->with('success', 'Registro eliminado con éxito');
        
    }

}
