<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresupuestosController extends Controller
{
    public function crear()
    {
    	return view('presupuestos.crear');
    }

    public function buscar()
    {
    	return view('presupuestos.buscar');
    }

    public function editar()
    {
    	return view('presupuestos.editar');
    }

    public function ver()
    {
        return view('presupuestos.ver');
    }
}
