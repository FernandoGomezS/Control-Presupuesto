<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    public function create()
    {
    	return view('budgets.create');
    }

    public function search()
    {
    	return view('budgets.search');
    }

    public function edit()
    {
    	return view('budgets.edit');
    }

    public function show()
    {
        return view('budgets.show');
    }
}
