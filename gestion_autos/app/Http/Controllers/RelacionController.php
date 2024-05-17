<?php

namespace App\Http\Controllers;
use App\Models\autos;
use App\Models\propietarios;


use Illuminate\Http\Request;

class RelacionController extends Controller
{
    public function index(){
        $autos = autos::all();
        return view('inicio', compact('autos'));
    }
}
