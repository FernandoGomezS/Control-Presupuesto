<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractsController extends Controller
{
     public function create()
    {
    	return view('contracts.create');
    }

    public function search()
    {
    	return view('contracts.search');
    }

    public function edit()
    {
    	return view('contracts.edit');
    }

    public function show()
    {
        return view('contracts.show');
    }
}
