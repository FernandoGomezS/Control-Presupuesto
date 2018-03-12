<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Contract;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Usuario', 'Administrador']);
        	//presupuesto activo
        	$budget=Budget::where('state','Activo')->get();
        	if($budget->count() == 0){
        		$budget=null;
        	}
        	//ultimos 5 contratos

			$contracts=Contract::where('budget_id',$budget[0]->id)
			->orderBy('created_at', 'desc')
               ->take(4)
               ->get();

			
        
        return view('web.index')->with('budget',$budget[0])->with('contracts',$contracts);
    }
}
