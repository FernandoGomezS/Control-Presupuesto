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
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\User;

class ContractsController extends Controller
{
	public function create()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			$responsablesAll= Responsable::all();
			$budget=Budget::where('state','Activo')->get();
			$componentesAll= Component::where('budget_id',$budget[0]->id)->get();

			return view('contracts.create')->with('responsables',$responsablesAll)->with('components',$componentesAll);
		}
	}

	public function search()
	{        
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){

			$contractAll=null;
				//buscando presupuesto activo 
			$budget=Budget::where('state','Activo')->get();
			if($budget->count() > 0)
			{		
				$contractAll= Contract::where('budget_id',$budget[0]->id)->get();				
			}
			return view('contracts.search')->with('contracts',$contractAll);
		}
	}

	public function edit(Contract $contract)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			$responsablesAll= Responsable::all();
			$budget=Budget::where('state','Activo')->get();
			$componentesAll= Component::where('budget_id',$budget[0]->id)->get();

			$date_finish = Carbon::createFromFormat('Y-m-d', $contract->date_finish);
			//formato fecha
			$contract->date_finish=$date_finish->format('d/m/Y');
			$date_start = Carbon::createFromFormat('Y-m-d', $contract->date_start);
			//formato fecha
			$contract->date_start=$date_start->format('d/m/Y');
			return view('contracts.edit')->with('contract',$contract)->with('responsables',$responsablesAll)->with('components',$componentesAll);
		}
	}

	public function show(Contract $contract)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			//quotas del contrato
			$quotas = Quota::where('contract_id', $contract->id)
			->orderBy('date_to_pay', 'asc')              
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
				return Response($output);	
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
				
				if($request->stage==""){
					$type_stage=TypeStage::where('id',$request->type_stages)->get();
					if($type_stage->count() > 0){

						$disponible=$type_stage[0]->amount_total-$type_stage[0]->amount_spent;

						if($request->amount_year<=$disponible){
							return Response('true');
						}
						else{
							return Response('false');
						}
					}
				}
				else{

					$stage=Stage::where('id',$request->stage)->get();
					if($stage->count() > 0){

						$disponible=$stage[0]->amount_total-$stage[0]->amount_spent;

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


				$typeStage = TypeStage::findOrFail($request['type_stages']);
				//agregamos el presupuesto
				$typeStage->amount_spent = $typeStage->amount_spent+$request['amount_year'];				
				$typeStage->save();
				//agregamos a componente
				$component = Component::findOrFail($typeStage->components->id);
				$component->amount_spent = $component->amount_spent+$request['amount_year'];
				$component->contracted_employees = $component->contracted_employees+1;
				$component->save();

				if( isset($request['stage'])){
					$contract->stage_id = $request['stage']; 
					$stage=Stage::findOrFail( $request['stage']);
					$stage->amount_spent=$stage->amount_spent+$request['amount_year'];
					$stage->save();
				}
				if( isset($request['category'])){
					$contract->category = $request['category']; 
				}
				$contract->state_contract = 'Firma contrato';  
				$contract->save();	


				//actualizamos el presupuesto con los datos del contrato
				$contracts=Contract::where('employee_id', $employee[0]->id)
				->get();

				//si tiene contratos no se suma a empelados
				if($contracts->count()<=1){
					$budget[0]->contracted_employees=$budget[0]->contracted_employees+1;
				}

				//sumanos el total al presupuesto general y al presupuesto de la etapa
				$budget[0]->amount_spent=$budget[0]->amount_spent+$request['amount_year'];
				$budget[0]->save();		
				

				$i=0;
				while ($i <$request['quotas']) {	

					$quota=new Quota();
					$quota->contract_id=$contract->id;
					$quota->amount=$request['amount_month'];
					$quota->type_stage_id=$request['type_stages'];
					$quota->date_to_pay=$date_start->addMonths(1); 
					//estado inicial de la cuota
					$quota->state_quota='Por Pagar'; 
					if(isset($request['stage'])){
						$quota->stage_id = $request['stage']; 
					}
					$quota->save();	
					$i++; 

				}				
				
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

			
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{

				//buscando id empleado
				$employee=Employee::where('rut',$request['rut_employee'])->get();
				//buscando presupuesto activo 
				$budget=Budget::where('state','Activo')->get();
				//buscamos contrato existente
				$contract = Contract::findOrFail($request->id);	
				$request= request()->all();			
				$contract->employee_id = $employee[0]->id;
				$contract->position = $request['position']; 
				$contract->function = $request['function'];  
				$contract->sport = $request['sport'];  
				$contract->duration = $request['duration'];  
				$contract->amount_year = $request['amount_year']; 
				$contract->amount_month = $request['amount_month']; 

				$contract->quotas = $request['quotas']; 
				$contract->hours = $request['hours']; 			
				$contract->budget_id= $budget[0]->id; 

				$date_start = Carbon::createFromFormat('d/m/Y', $request['date_start']);
				$contract->date_start = $date_start;
				$date_finish = Carbon::createFromFormat('d/m/Y', $request['date_finish']);
				$contract->date_finish = $date_finish;     

				$contract->program = $request['program']; 
				$contract->responsable_id = $request['responsable'];



				//buscamos el anterior tipo de etapa
				$typeStage=TypeStage::findOrFail($contract->type_stage_id);
				//eliminamos lo gastado
				$typeStage->amount_spent=$typeStage->amount_spent-$contract->amount_total;
				$typeStage->save();
				//eliminar en componente
				$component=Component::findOrFail($typeStage->components->id);
				$component->amount_spent=$component->amount_spent-$contract->amount_total;
				$component->save();
				// el nuevo tipo de etapa
				$contract->type_stage_id= $request['type_stages'];
				$typeStage=TypeStage::findOrFail($request['type_stages']);
				//agregamos 
				$typeStage->amount_spent=$typeStage->amount_spent+$request['amount_year'];
				$typeStage->save();
				//agregamos a componente
				$component=Component::findOrFail($typeStage->components->id);
				$component->amount_spent=$component->amount_spent+$request['amount_year'];
				$component->save();
				
				//eliminar gasto si existia etapa
				if($contract->stage_id!=null){
					$stage=Stage::findOrFail($contract->stage_id);
					$stage->amount_spent=$stage->amount_spent-$contract->amount_total;
					$stage->save();
				} 

				if( isset($request['stage'])){
					$contract->stage_id = $request['stage'];
					$stage=Stage::findOrFail( $request['stage']);
					$stage->amount_spent=$stage->amount_spent+$request['amount_year'];
					$stage->save();
					if( isset($request['category'])){
						$contract->category = $request['category']; 
					}

				}
				else{
					$contract->stage_id =null;
					$contract->category =null;
				}			
				
				//actualizamos el presupuesto con los datos del contrato
				$budget[0]->amount_spent=$budget[0]->amount_spent-$contract->amount_total;
				$budget[0]->amount_spent=$budget[0]->amount_spent+$request['amount_year'];
				$budget[0]->save();	

				$contract->amount_total = $request['amount_year'];
				$contract->state_contract = 'Firma contrato';  
				$contract->save();	

				$quotas = Quota::where('contract_id', $contract->id)
				->orderBy('date_to_pay', 'asc')              
				->get();	

				if($quotas->count() >0){
					$i=1;
					foreach ($quotas as  $quota) {
						if($quota->state_quota!='Pagado' && $quota->state_quota!='Anulada'){
							if($i <=$request['quotas']){
								$quota->amount=$request['amount_month'];
								$quota->type_stage_id=$request['type_stages'];
								if(isset($request['stage'])){
									$quota->stage_id = $request['stage']; 
								}
								$quota->save();
							}
							else{
								$quota->delete();
							}
						}						
						$i++;						
					}
					while ($i <=$request['quotas']) {
						$quota=new Quota();
						$quota->contract_id=$contract->id;
						$quota->amount=$request['amount_month'];
						$quota->type_stage_id=$request['type_stages'];
						$quota->date_to_pay=$date_start->addMonths(1); 
						//estado inicial de la cuota
						$quota->state_quota='Por Pagar'; 
						if(isset($request['stage'])){
							$quota->stage_id = $request['stage']; 
						}
						$quota->save();	
						$i++; 
					}	
				}	

				flash('Se Modificó Correctamente el Contrato Nº'.$contract->id.'.')->success();
				return redirect()->intended(route('contracts.search'));
			}
		}
	}

	public function destroy(Contract $contract){


		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario'))
		{
			//actualiza el presupuesto 
			$budget=Budget::where('state','Activo')->get();	
			$budget[0]->amount_spent=$budget[0]->amount_spent-$contract->amount_year+$contract->amount_paid;
			$budget[0]->save();	

			//cambiar estado cuotas quotas
			$quotas=Quota::where('contract_id',$contract->id)
			->where('state_quota', '!=' ,'Pagado')
			->get();
			if($quotas->count() >0){
				foreach ($quotas as  $quota) {
					$quota->state_quota='Anulada';
					$quota->save();
				}
			}				

			//cambia estado	contrato
			$contract->state_contract ='Cancelado';
			$contract->save();

			flash('Se Cancelo Correctamente el Contrato.')->success();
			return redirect()->intended(route('contracts.search'));
		}
	}

	public function updateState(Contract $contract, Request $request){  

		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){

			$validator = Validator::make($request->all(), [
				'number_memo_contract' => 'required|max:255',
				'date_memo_contract' => 'required|date_format:d/m/Y',
				'date_signature_contract' => 'required|date_format:d/m/Y',						
			]);         
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();				
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{
				$request= request()->all();				

				$contract=Contract::findOrFail($request['id']);	
				$contract->number_memo_contract=$request['number_memo_contract'];

				$date=Carbon::createFromFormat('d/m/Y', $request['date_memo_contract']);									
				$contract->date_memo_contract=$date;
				$date2=Carbon::createFromFormat('d/m/Y', $request['date_signature_contract']);								
				$contract->date_signature_contract=$date2;				

				$contract->state_contract='Contratado';	
				$contract->save();

				flash('Se modificó el estado del contrato  a Contratado.')->success();
				return redirect()->back();

			}
		}
	}
	public function createPdf(Contract $contract){

		$pdf = PDF::loadView('layouts.pdf', compact('contract'));
		return $pdf->download('contrato_'.$contract->id.'.pdf');
	}

	public function createExcelContracts()
	{
		$budget=Budget::where('state','Activo')->get();

		Excel::create('Contratos '.$budget[0]->year, function($excel)  {
			$excel->sheet('Contratos', function($sheet) {

				$sheet->row(1, [
					'N°','FECHA','NOMBRE','RUT','DOMICILIO','COMUNA','CIUDAD','CARGO','PROGRAMA','COMPONENTE','HORAS/EVENTOS MENSUALES','N°CUOTAS','RENTA GLOBAL','RENTA GLOBAL (PALABRA)','RENTA MENSUAL','RENTA MENSUAL (PALABRA)','Transitorio/Permanente','INICIO','TERMINO','NOMBRE FIRMA','PROFESION/OFICIO','FUNCIONES 1','NAC.','AFP','SALUD','CORREO'
				]);
				$budget=Budget::where('state','Activo')->get();
				$contracts=Contract::where('budget_id',$budget[0]->id)->get();
				foreach($contracts as $index => $contract) {
					$sheet->row($index+2, [
						$contract->id ,  Carbon::createFromFormat('Y-m-d H:i:s', $contract->created_at )->format('d/m/Y') , $contract->employees->names.' '.$contract->employees->last_name.' '.$contract->employees->last_name_mother , $contract->employees->rut , $contract->employees->address , $contract->employees->commune , $contract->employees->city , $contract->function , $contract->program , $contract->type_stages->components->name , $contract->hours , $contract->quotas ,  $contract->amount_total ,  \NumeroALetras::convertir($contract->amount_total, 'pesos') , $contract->amount_month , \NumeroALetras::convertir($contract->amount_month, 'pesos') , $contract->duration , Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y') , Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y') ,  $contract->employees->names.' '.$contract->employees->last_name.' '.$contract->employees->last_name_mother , $contract->employees->profession ,  $contract->function , Carbon::createFromFormat('Y-m-d', $contract->employees->birth_date )->format('d/m/Y') , $contract->employees->afps->name , $contract->employees->healths->name , $contract->employees->email ]); 
				}
				$i = 0;
				$letra=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
				while ( $i<= 25) {
					$j=1;
					$sheet->cell($letra[$i].'1', function($cell) 
					{
						$cell->setFontWeight('bold');
						$cell->setBackground('#cccccc');
						$cell->setBorder('thin','thin','thin','thin');
					});
					while($j <= $contract->count()+1){
						$sheet->cell($letra[$i].$j, function($cell) 
						{		
							$cell->setBorder('thin','thin','thin','thin');
						});
						$j++;
					} 					
					$i++;
				}
			});
		})->export('xls');
	}
	public function createExcelBudgets()
	{
		$budget=Budget::where('state','Activo')->get();

		Excel::create('Presupuestos '.$budget[0]->year, function($excel)  {
			$excel->sheet('COMPETENCIA ESCOLAR', function($sheet) {

				$budget=Budget::where('state','Activo')->get();
				$sheet->row(1, ['COMPETENCIA','PRESUPUESTO INICIAL','PRESUPUESTO UTILIZADO','PRESUPUESTO DISPONIBLE' ]);
				$competencia=Component::where('budget_id',$budget[0]->id )->where('name','Escolar')->get();			
				$sheet->row(2, ['COMPETENCIA ESCOLAR',$competencia[0]->amount_total,$competencia[0]->amount_spent,$competencia[0]->amount_total-$competencia[0]->amount_spent ]);				
				$typeStages=TypeStage::Where('component_id',$competencia[0]->id)->get();
				$k=3;
				foreach($typeStages as $index => $typeStage) {
						$sheet->row($k, [ $typeStage->name, $typeStage->amount_total, $typeStage->amount_spent , $typeStage->amount_total -$typeStage->amount_spent ]);
						$k++; 
						$stages= Stage::where('type_stage_id',$typeStage->id)->get();
						foreach($stages as $stage) {
							$sheet->row($k, [ $stage->name, $stage->amount_total, $stage->amount_spent , $stage->amount_total -$stage->amount_spent ]);
							$k++;
						}
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {
					$j=1;
					$sheet->cell($letra[$i].'1', function($cell) 
					{
						$cell->setFontWeight('bold');
						$cell->setBackground('#cccccc');
						$cell->setBorder('thin','thin','thin','thin');
					});
					while($j <= 94){
						$sheet->cell($letra[$i].$j, function($cell) 
						{		
							$cell->setBorder('thin','thin','thin','thin');
						});
						$j++;
					} 					
					$i++;
				}				
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {					
					$sheet->cell($letra[$i].'3', function($cell) 
					{						
						$cell->setBackground('#cccccc');						
					});
					$i++;
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {					
					$sheet->cell($letra[$i].'56', function($cell) 
					{						
						$cell->setBackground('#cccccc');						
					});
					$i++;
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {					
					$sheet->cell($letra[$i].'64', function($cell) 
					{						
						$cell->setBackground('#cccccc');						
					});
					$i++;
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {				
					$sheet->cell($letra[$i].'77', function($cell) 
					{						
						$cell->setBackground('#cccccc');						
					});
					$i++;
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {					
					$sheet->cell($letra[$i].'90', function($cell) 
					{					
						$cell->setBackground('#cccccc');						
					});	
					$i++;				
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {					
					$sheet->cell($letra[$i].'94', function($cell) 
					{						
						$cell->setBackground('#cccccc');						
					});
					$i++;
				}
			});
			$excel->sheet('COMPETENCIA FEDERADA ', function($sheet) {

				$budget=Budget::where('state','Activo')->get();
				$sheet->row(1, ['COMPETENCIA','PRESUPUESTO INICIAL','PRESUPUESTO UTILIZADO','PRESUPUESTO DISPONIBLE' ]);
				$competencia=Component::where('budget_id',$budget[0]->id )->where('name','Federada')->get();			
				$sheet->row(2, ['COMPETENCIA FEDERADA',$competencia[0]->amount_total,$competencia[0]->amount_spent,$competencia[0]->amount_total-$competencia[0]->amount_spent ]);				
				$typeStages=TypeStage::Where('component_id',$competencia[0]->id)->get();
				$k=3;
				foreach($typeStages as $index => $typeStage) {
						$sheet->row($k, [ $typeStage->name, $typeStage->amount_total, $typeStage->amount_spent , $typeStage->amount_total -$typeStage->amount_spent ]);
						$k++; 						
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {
					$j=1;
					$sheet->cell($letra[$i].'1', function($cell) 
					{
						$cell->setFontWeight('bold');
						$cell->setBackground('#cccccc');
						$cell->setBorder('thin','thin','thin','thin');
					});
					while($j <= 4){
						$sheet->cell($letra[$i].$j, function($cell) 
						{		
							$cell->setBorder('thin','thin','thin','thin');
						});
						$j++;
					} 					
					$i++;
				}		
				});

			$excel->sheet('COMPETENCIA EDUCACION SUPERIOR', function($sheet) {

				$budget=Budget::where('state','Activo')->get();
				$sheet->row(1, ['COMPETENCIA','PRESUPUESTO INICIAL','PRESUPUESTO UTILIZADO','PRESUPUESTO DISPONIBLE' ]);
				$competencia=Component::where('budget_id',$budget[0]->id )->where('name','Educación superior')->get();			
				$sheet->row(2, ['COMPETENCIA LIGAS DE EDUCACION SUPERIOR',$competencia[0]->amount_total,$competencia[0]->amount_spent,$competencia[0]->amount_total-$competencia[0]->amount_spent ]);				
				$typeStages=TypeStage::Where('component_id',$competencia[0]->id)->get();
				$k=3;
				foreach($typeStages as $index => $typeStage) {
						$sheet->row($k, [ $typeStage->name, $typeStage->amount_total, $typeStage->amount_spent , $typeStage->amount_total -$typeStage->amount_spent ]);
						$k++; 						
				}
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {
					$j=1;
					$sheet->cell($letra[$i].'1', function($cell) 
					{
						$cell->setFontWeight('bold');
						$cell->setBackground('#cccccc');
						$cell->setBorder('thin','thin','thin','thin');
					});
					while($j <= 4){
						$sheet->cell($letra[$i].$j, function($cell) 
						{		
							$cell->setBorder('thin','thin','thin','thin');
						});
						$j++;
					} 					
					$i++;
				}		
				});
		})->export('xls');
	}

	public function createExcelEmployees()
	{
		$budget=Budget::where('state','Activo')->get();

		Excel::create('Nº Empleados '.$budget[0]->year, function($excel)  {
			$excel->sheet('Nº Empleados', function($sheet) {

				$budget=Budget::where('state','Activo')->get();

				$sheet->row(1, ['COMPETENCIA','Nº EMPLEADOS INICIAL','Nº EMPLEADOS CONTRATADOS','Nº EMPLEADOS DISPONIBLES' ]);
				$competencias=Component::where('budget_id',$budget[0]->id )->get();	
						foreach($competencias as $index => $competencia) {
				$sheet->row($index+2, ['COMPETENCIA '.$competencia->name,$competencia->numbers_employees,$competencia->contracted_employees,$competencia->numbers_employees-$competencia->contracted_employees ]);	
				}			
				
				$i = 0;
				$letra=['A','B','C','D',];
				while ( $i<= 3) {
					$j=1;
					$sheet->cell($letra[$i].'1', function($cell) 
					{
						$cell->setFontWeight('bold');
						$cell->setBackground('#cccccc');
						$cell->setBorder('thin','thin','thin','thin');
					});
					while($j <=4){
						$sheet->cell($letra[$i].$j, function($cell) 
						{		
							$cell->setBorder('thin','thin','thin','thin');
						});
						$j++;
					} 					
					$i++;
				}			
							
			});				
		})->export('xls');
	}

}



