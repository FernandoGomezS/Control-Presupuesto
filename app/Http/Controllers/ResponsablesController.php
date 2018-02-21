<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsablesController extends Controller
{
     public function crear()
    {
    	return view('responsables.crear');
    }

    public function buscar()
    {
    	return view('responsables.buscar');
    }

    public function editar()
    {
    	return view('responsables.editar');
    }

    public function ver()
    {
        return view('responsables.ver');
    }
}
