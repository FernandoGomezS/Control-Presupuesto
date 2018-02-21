<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratosController extends Controller
{
     public function crear()
    {
    	return view('contratos.crear');
    }

    public function buscar()
    {
    	return view('contratos.buscar');
    }

    public function editar()
    {
    	return view('contratos.editar');
    }

    public function ver()
    {
        return view('contratos.ver');
    }
}
