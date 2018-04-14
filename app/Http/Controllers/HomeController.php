<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Contract;
use App\Component;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Usuario', 'Administrador']);

        	$sumPaid=0;
        	//presupuesto activo
        	$budget=Budget::where('state','Activo')->get();
        	if($budget->count() == 0){
        		$budget=null;
        		$contracts=null;
        		$competencias=null;
        	}
        	else{
        		//ultimos 5 contratos
        		$contracts=Contract::where('budget_id',$budget[0]->id)
			->orderBy('created_at', 'desc')
               ->take(4)
               ->get();

               $contractsSum=Contract::where('budget_id',$budget[0]->id)->get();               
               foreach ($contractsSum as $key => $value) {
               	 $sumPaid=$value->amount_paid+$sumPaid;
               }

               $competencias=Component::where('budget_id',$budget[0]->id )->get();							
        	}
        		
        
        return view('web.index')->with('budget',$budget[0])->with('contracts',$contracts)->with('sumPaid',$sumPaid)->with('competencias',$competencias);
    }
}
