<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
   public function crear()
    {
    	return view('empleados.crear');
    }

    public function buscar()
    {
    	return view('empleados.buscar');
    }

    public function editar()
    {
    	return view('empleados.editar');
    }

    public function ver()
    {
        return view('empleados.ver');
    }
}
