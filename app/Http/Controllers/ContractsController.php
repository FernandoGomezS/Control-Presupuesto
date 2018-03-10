<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsable;
use App\Component;
use App\TypeStage;
use App\Stage;
use App\Contract;
use App\Budget;
use App\Quota;
use App\Employee;
use Validator;
use Carbon\Carbon;

class ContractsController extends Controller
{
	public function create()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			$responsablesAll= Responsable::all();
			$componentesAll= Component::all();

			return view('contracts.create')->with('responsables',$responsablesAll)->with('components',$componentesAll);
		}
	}

	public function search()
	{        
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			$contractAll= Contract::all();
			return view('contracts.search')->with('contracts',$contractAll);
		}
	}

	public function edit()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			return view('contracts.edit');
		}
	}

	public function show(Contract $contract)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){

			$quotas = Quota::where('contract_id', $contract->id)
			->orderBy('created_at', 'desc')              
			->get();
			return view('contracts.show')->with('contract',$contract)->with('quotas',$quotas);
		}
	}
	public function searchComponent(Request $request)
	{			
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){			

			if($request->ajax())
			{
				
				$output='<option value="">-- Por favor seleccione --</option>';					
			   //buscamos empleado				   								
				$type_stages = TypeStage::where('component_id',$request->id_component)->get();				
				if($type_stages->count() > 0)
				{				
					foreach ($type_stages as  $type_stage) {
						$output.= '<option  value="'.$type_stage->id.'">'.$type_stage->name.'</option>';
					}
					return Response($output);
				}	
			}			
		}	
	}
	

	public function searchTypes(Request $request)
	{			
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){			

			if($request->ajax())
			{				
				$output='<option value="">-- Por favor seleccione --</option>';					
			   //buscamos empleado				   								
				$stages = Stage::where('type_stage_id',$request->id_type_stages)->get();				
				if($stages->count() > 0)
				{				
					foreach ($stages as  $stage) {
						$output.= '<option  value="'.$stage->id.'">'.$stage->name.'</option>';
					}
					return Response($output);
				}	
			}			
		}	
	}
	public function searchBudget(Request $request)
	{			
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){			

			if($request->ajax())
			{				
			   	//buscando presupuesto activo 
				$budget=Budget::where('state','Activo')->get();

				if($budget->count() > 0)
				{	
					$disponible=$budget[0]->amount_total-$budget[0]->amount_spent;

					if($request->amount_year<=$disponible){
						return Response('true');
					}					

					else{
						return Response('false');
					}
				}	
			}	
		}
	}
	

	public function store(Request $request)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			

			$validator = Validator::make($request->all(), [
				'rut_employee' => 'required|max:255',

				'position' => 'required|max:255',
				'function' => 'required|max:255',                
				'sport' => 'required|max:255',
				'duration' => 'required|max:255',			
				'amount_year' => 'required|max:255',
				'amount_month' => 'required|max:255',
				'quotas' => 'required|max:255',
				'hours' => 'required|max:255',
				'date_start' => 'required|date_format:d/m/Y',
				'date_finish' => 'required|date_format:d/m/Y',

				
				'program' => 'required|max:255',
				'responsable' => 'required',
				'component' => 'required|max:255',				
				'type_stages' => 'required|max:255',
				'stage' => 'max:255',
				'category' => 'max:255',			
			]);         
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();				
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{
				
       			//buscando id empleado
				$employee=Employee::where('rut',$request['rut_employee'])->get();
				//buscando presupuesto activo 
				$budget=Budget::where('state','Activo')->get();

				$request= request()->all();
				$contract = new Contract();
				$contract->employee_id = $employee[0]->id;
				$contract->position = $request['position']; 
				$contract->function = $request['function'];  
				$contract->sport = $request['sport'];  
				$contract->duration = $request['duration'];  
				$contract->amount_year = $request['amount_year']; 
				$contract->amount_month = $request['amount_month']; 
				$contract->amount_total = $request['amount_year']; 
				$contract->quotas = $request['quotas']; 
				$contract->hours = $request['hours']; 			
				$contract->budget_id= $budget[0]->id; 

				$date_start = Carbon::createFromFormat('d/m/Y', $request['date_start']);
				$contract->date_start = $date_start;
				$date_finish = Carbon::createFromFormat('d/m/Y', $request['date_finish']);
				$contract->date_finish = $date_finish;     

				$contract->program = $request['program']; 
				$contract->responsable_id = $request['responsable']; 					
				$contract->type_stage_id= $request['type_stages']; 

				if( isset($request['stage'])){
					$contract->stage_id = $request['stage']; 
				}
				if( isset($request['category'])){
					$contract->category = $request['category']; 
				}
				$contract->state_contract = 'Firma contrato';  
				$contract->save();	

				//actualizamos el presupuesto con los datos del contrato

				$budget[0]->contracted_employees=$budget[0]->contracted_employees+1;
				$budget[0]->amount_spent=$budget[0]->amount_spent+$request['amount_year'];
				$budget[0]->save();		

				$i=0;

					$quota=new Quota();
					$quota->contract_id=$contract->id;
					$quota->amount=$request['amount_month'];
					$quota->type_stage_id=1;
					$quota->date_to_pay=$date_start->addMonths(1); 
					$quota->state_quota='A Pagar';   
					if(isset($request['stage'])){
						$quota->stage_id = $request['stage']; 
					}
					$quota->save();	
				//creamos las cuotas del contrato
				/*
				while ($i <$request['quotas']) {
					$quota=new Quota();
					$quota->contract_id=$contract->id;
					$quota->amount=$request['amount_month'];
					$quota->type_stage_id=$request['type_stages'];
					$quota->date_to_pay=$date_start->addMonths(1); 
					$quota->state_quota='A Pagar';   
					if(isset($request['stage'])){
						$quota->stage_id = $request['stage']; 
					}
					$quota->save();	
					$i++; 
				}			*/	
				
				flash('Se Creó Correctamente el Contrato.')->success();
				return redirect()->route('contracts.search');
			}
		}
	}

	public function update(Request $request){       
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){

			$validator = Validator::make($request->all(), [
				'rut_employee' => 'required|max:255',

				'position' => 'required|max:255',
				'function' => 'required|max:255',                
				'sport' => 'required|max:255',
				'duration' => 'required|max:255',			
				'amount_year' => 'required|max:255',
				'amount_month' => 'required|max:255',
				'quotas' => 'required|max:255',
				'hours' => 'required|max:255',
				'date_start' => 'required|date_format:d/m/Y',
				'date_finish' => 'required|date_format:d/m/Y',

				
				'program' => 'required|max:255',
				'responsable' => 'required',
				'component' => 'required|max:255',				
				'type_stages' => 'required|max:255',
				'stage' => 'max:255',
				'category' => 'max:255',       
			]);
			$contract = Contract::findOrFail($request->id);			
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{

				$request= request()->all();				
				$contract->names = $request['names'];
				$contract->email = $request['email']; 
				$contract->last_name = $request['last_name'];  
				$contract->last_name_mother = $request['last_name_mother'];  
				$contract->rut = $request['rut'];  
				$contract->phone = $request['phone']; 
				$contract->address = $request['address'];  
				$date = Carbon::createFromFormat('d/m/Y', $request['birth_date']);
				$contract->birth_date = $date;       
				$contract->commune = $request['commune']; 
				$contract->profession = $request['profession']; 
				if($request['semesters']!=null){
					$contract->semesters = $request['semesters']; 
				}
				else{
					$contract->semesters = null; 
				}
				$contract->quality_studies = $request['quality_studies'];
				$contract->afp_id = $request['afp'];
				$contract->health_id = $request['health']; 
				$contract->save();
				flash('Se Modificó Correctamente el empelado '.$contract->name.'.')->success();
				return redirect()->intended(route('employees.search'));
			}
		}
	}

	public function destroy(Contract $contract){

		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario'))
		{
	
			$contract->delete();
			flash('Se eliminó Correctamente el Contrato.')->success();
			return redirect()->intended(route('contracts.search'));
		}
	}
}
