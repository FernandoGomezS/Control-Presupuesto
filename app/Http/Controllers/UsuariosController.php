<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
   public function crear()
    {
    	return view('usuarios.crear');
    }

    public function buscar()
    {
    	return view('usuarios.buscar');
    }

    public function editar()
    {
    	return view('usuarios.editar');
    }

    public function ver()
    {
        return view('usuarios.ver');
    }
}
