<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsablesController extends Controller
{
     public function create()
    {
    	return view('responsables.create');
    }

    public function search()
    {
    	return view('responsables.search');
    }

    public function edit()
    {
    	return view('responsables.edit');
    }

    public function show()
    {
        return view('responsables.show');
    }
}
