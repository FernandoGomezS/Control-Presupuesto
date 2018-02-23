<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
   public function create()
    {
    	return view('employees.create');
    }

    public function search()
    {
    	return view('employees.search');
    }

    public function edit()
    {
    	return view('employees.edit');
    }

    public function show()
    {
        return view('employees.show');
    }
}
