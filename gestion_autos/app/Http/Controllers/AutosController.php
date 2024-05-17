<?php

namespace App\Http\Controllers;

use App\Models\autos;
use App\Models\marcas;
use App\Models\propietarios;
use Illuminate\Http\Request;

class AutosController extends Controller
{
    //establecer relaciones
        public function propietarios()
    {
        return $this->belongsTo(propietarios::class, 'propietarios_id_propietario');
    }

    public function marcas()
    {
        return $this->belongsTo(marcas::class, 'marcas_id_marca');
    }


    //inicio
    public function index()
    {
        $propietarios = propietarios::all();
        $datos = autos::with('propietarios')->orderBy('id', 'desc')->paginate(3);
        
        return view('autos/inicioAutos', compact('datos', 'propietarios'));
    }
    
    //agregar
    public function create()
    {
        $propietarios = propietarios::all();
        $marcas = marcas::all();
    
        return view('autos/agregarAutos', compact('propietarios', 'marcas'));
    }


    public function store(Request $request)
    {
        //validaciones
        $request->validate([
            'propietarios_id_propietario' => 'required',
            'marcas_id_marca' => 'required',
        ]);

        //guardar datos en la BDD
        $autos = new autos();
        $autos->rodado = $request->post('rodado');
        $autos->modelo = $request->post('modelo');
        $autos->color = $request->post('color');
        $autos->patente = $request->post('patente');
        $autos->chasis = $request->post('chasis');
        $autos->propietarios_id_propietario = $request->post('propietarios_id_propietario');
        $autos->marcas_id_marca = $request->post('marcas_id_marca');
        $autos->save();

        return redirect()->route('autos.index')->with('success', 'Se agregó un registro con éxito');
    }

    public function show($id)
    {
        //muestra una alerta
        $autos = autos::find($id);
        return view('autos/eliminarAutos', compact('autos'));
    }

    public function edit($id)
    {
        //trae los datos que se van a editar y los carga en un formulario
        $propietarios = propietarios::all();
        $marcas = marcas::all();
        $autos = autos::find($id);
        
        return view("autos/editarAutos", compact('autos', 'propietarios', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        //actualiza los datos en la BDD
        $autos = autos::find($id);
        $autos->rodado = $request->post('rodado');
        $autos->modelo = $request->post('modelo');
        $autos->color = $request->post('color');
        $autos->patente = $request->post('patente');
        $autos->chasis = $request->post('chasis');
        $autos->propietarios_id_propietario = $request->post('propietarios_id_propietario');
        $autos->marcas_id_marca = $request->post('marcas_id_marca');
        $autos->save();

        return redirect()->route('autos.index')->with('success', 'Se actualizó un registro con éxito');

    }

    public function destroy($id)
    {
        //elimina un registro
        $autos = autos::find($id);
        $autos->delete();
        return redirect()->route('autos.index')->with('success', 'Se eliminó un registro con éxito');
    }
    

}
