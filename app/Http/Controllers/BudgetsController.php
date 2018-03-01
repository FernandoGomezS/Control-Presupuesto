<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Budget;

class BudgetsController extends Controller
{
	public function create()
	{
		if(auth()->user()->hasRole('Administrador')){
			return view('budgets.create');
		}
	}

	public function search()
	{

		if(auth()->user()->hasRole('Administrador')){
			$budgetAll= Budget::all();

			return view('budgets.search')->with('budgets',$budgetAll);
		}
		
	}

	public function edit(Budget $budget)
	{
		if(auth()->user()->hasRole('Administrador')){

			return view('budgets.edit')->with('budget',$budget);
		}
	}

	public function show()
	{
		return view('budgets.show');
	}

	public function store(Request $request)
	{
		if(auth()->user()->hasRole('Administrador')){

			$validator = Validator::make($request->all(), [
				'year' => 'required|unique:budgets,year',
				'amount_total' => 'required|max:255',
				'numbers_employees' => 'required|max:255',

			]);         
			if ($validator->fails()) {				
				return redirect()->back()->withErrors($validator->errors());
			}           
			else{
				$data= request()->all();

				if($data['state']=='Activo')
				{

					 $budget= Budget::where('state', 'Activo')->get(); 

					 $budget[0]->state='Inactivo';
					 $budget[0]->save();
				}		
					$user = new Budget();
					$user->year = $data['year'];
					$user->amount_total = $data['amount_total'];
					$user->numbers_employees = $data['numbers_employees']; 
					$user->state = $data['state'];                
					$user->save();
				
				return redirect()->route('budgets.search');
			}
		}

	}
	public function update(Request $request, Budget $budget)
	{		


		if(auth()->user()->hasRole('Administrador')){

			$validator = Validator::make($request->all(), [
				'year' => 'required|max:255',
				'amount_total' => 'required|max:255',
				'numbers_employees' => 'required|max:255',         
			]);
			$budget = Budget::findOrFail($request->id);	
			$validator->sometimes('year', 'unique:budgets', function ($input) use ($budget) {

				return strtolower($input->year) != strtolower($budget->year);
			});

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}			
			else{

				$budget->year = $request->get('year');
				$budget->amount_total = $request->get('amount_total'); 
				$budget->numbers_employees = $request->get('numbers_employees');
				//Si el estado es activo , desactivamos en presupuesto activo.
				if($request['state']=='Activo')
				{

					 $budgetActive= Budget::where('state', 'Activo')->get();
					 $budgetActive[0]->state='Inactivo';					 
					 $budgetActive[0]->save();
				}	
				$budget->state = $request->get('state');
				$budget->save();
				
				return redirect()->intended(route('budgets.search'));
			}

		}
	}

	public function destroy(Budget $budget){

		if(auth()->user()->hasRole('Administrador'))
		{
				
			$budget->delete();
			
			return redirect()->intended(route('budgets.search'));
		}
	}
}
