<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Budget;
use App\Component;
use App\TypeStage;
use App\Stage;
use App\Contract;

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
			//datos componente por id de presupuesto
			$components=Component::where('budget_id',$budget->id)->get();
			//datos tipos de etapa
			
			$typeStages1=TypeStage::where('component_id',$components[0]->id)->get();
			$typeStages2=TypeStage::where('component_id',$components[1]->id)->get();
			$typeStages3=TypeStage::where('component_id',$components[2]->id)->get();

			//datos etapas
			$stages1=Stage::where('type_stage_id',$typeStages1[0]->id)->get();
			$stages2=Stage::where('type_stage_id',$typeStages1[1]->id)->get();
			$stages3=Stage::where('type_stage_id',$typeStages1[2]->id)->get();
			$stages4=Stage::where('type_stage_id',$typeStages1[3]->id)->get();
			$stages5=Stage::where('type_stage_id',$typeStages1[4]->id)->get();

			return view('budgets.edit')->with('budget',$budget)->with('components',$components)->with('typeStages1',$typeStages1)->with('typeStages2',$typeStages2)->with('typeStages3',$typeStages3)->with('stages1',$stages1)->with('stages2',$stages2)->with('stages3',$stages3)->with('stages4',$stages4)->with('stages5',$stages5);
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
				'year' => 'required|unique:budgets,year|digits:4|integer|min:1900',
				'amount_total' => 'required|max:255',
				'numbers_employees' => 'required|max:255',

			]);         
			if ($validator->fails()) {	
				flash('Error, Por favor Ingresa valores correctos.')->error();			
				return redirect()->back()->withErrors($validator->errors())->withInput();;
			}           
			else{
				$data= request()->all();


				
				if($data['state']=='Activo')
				{
					$budget= Budget::where('state', 'Activo')->get(); 
					if($budget->count() >0){
						$budget[0]->state='Inactivo';
						$budget[0]->save();
					}					
				}	
				//Presupuesto	
				$budget_new = new Budget();
				$budget_new->year = $data['year'];
				$budget_new->amount_total = $data['amount_total'];
					//0 gastado inicial
				$budget_new->amount_spent = 0;
					//0 empleados coontratados
				$budget_new->contracted_employees = 0;					
				$budget_new->numbers_employees = $data['numbers_employees']; 
				$budget_new->state = $data['state']; 
				$budget_new->save();
				
				//componentes
				$component1 = new Component();
				$component1->name = 'Escolar';
				$component1->budget_id = $budget_new->id;
				$component1->amount_total = $data['amount_school_competition'];	
				$component1->amount_spent = 0;			
				$component1->numbers_employees = $data['employees_school_competition'];
				$component1->contracted_employees = 0;
				$component1->save();

				$component2 = new Component();
				$component2->name = 'Federada';
				$component2->budget_id = $budget_new->id;
				$component2->amount_total = $data['amount_federated_competition'];	
				$component2->amount_spent = 0;				
				$component2->numbers_employees = $data['employees_federated_competition'];
				$component2->contracted_employees = 0;
				$component2->save();

				$component3 = new Component();
				$component3->name ='Educación superior';
				$component3->budget_id = $budget_new->id;
				$component3->amount_total = $data['amount_school_sup_competition'];	
				$component3->amount_spent = 0;				
				$component3->numbers_employees = $data['employees_school_sup_competition'];
				$component3->contracted_employees = 0;				
				$component3->save();				

				//tipos de etapa

				//Componente Escolar

				$type_stages1 = new TypeStage();
				$type_stages1->name = 'Comunal';
				$type_stages1->component_id = $component1->id ;
				$type_stages1->amount_total = $data['amount_stage_communal'];
				$type_stages1->amount_spent = 0;
				$type_stages1->save();

				$type_stages2 = new TypeStage();
				$type_stages2->name = 'Provincial';
				$type_stages2->component_id = $component1->id ;
				$type_stages2->amount_total = $data['amount_stage_provincial'];
				$type_stages2->amount_spent = 0;
				$type_stages2->save();

				$type_stages3 = new TypeStage();
				$type_stages3->name = 'Regional';
				$type_stages3->component_id =$component1->id ;
				$type_stages3->amount_total = $data['amount_stage_regional'];
				$type_stages3->amount_spent = 0;
				$type_stages3->save();	

				$type_stages4 = new TypeStage();
				$type_stages4->name = 'Nacional';
				$type_stages4->component_id = $component1->id ;
				$type_stages4->amount_total = $data['amount_stage_national'];
				$type_stages4->amount_spent = 0;
				$type_stages4->save();	

				$type_stages5 = new TypeStage();
				$type_stages5->name = 'Juegos Pre-Deportivos escolares';
				$type_stages5->component_id = $component1->id ;
				$type_stages5->amount_total = $data['amount_stage_games'];
				$type_stages5->amount_spent = 0;
				$type_stages5->save();	

				$type_stages10 = new TypeStage();
				$type_stages10->name = 'Coordinación Interna';
				$type_stages10->component_id = $component1->id ;
				$type_stages10->amount_total = $data['amount_coordination'];
				$type_stages10->amount_spent = 0;
				$type_stages10->save();	

				//Componente Federado
				$type_stages6 = new TypeStage();
				$type_stages6->name = 'Preparación';
				$type_stages6->component_id = $component2->id ;
				$type_stages6->amount_total = $data['amount_stage_preparation'];
				$type_stages6->amount_spent = 0;
				$type_stages6->save();	

				$type_stages7 = new TypeStage();
				$type_stages7->name = 'Participación';
				$type_stages7->component_id = $component2->id ;
				$type_stages7->amount_total = $data['amount_stage_participation'];
				$type_stages7->amount_spent = 0;
				$type_stages7->save();	

				//Componente Ligas de Educación superior
				$type_stages8 = new TypeStage();
				$type_stages8->name = 'Regional';
				$type_stages8->component_id = $component3->id ;
				$type_stages8->amount_total = $data['amount_stage_regional_sup'];
				$type_stages8->amount_spent = 0;
				$type_stages8->save();	

				$type_stages9 = new TypeStage();
				$type_stages9->name = 'Coordinacion LDES';
				$type_stages9->component_id = $component3->id ;
				$type_stages9->amount_total = $data['amount_stage_ldes'];
				$type_stages9->amount_spent = 0;
				$type_stages9->save();	


				//Etapa Comunal
				$data2=[' ','La Florida','La Pintana','Pirque','Puente Alto	','San José de Maipo','La Reina','Las Condes','Lo Barnechea','Macul','Ñuñoa','Peñalolén','Providencia','Vitacura','Pedro Aguirre Cerda','San Joaquín','San Miguel','Santiago','Buin','Calera de Tango','El Bosque','La Cisterna','La Granja','Lo Espejo','Paine','San Bernardo','San Ramón','Cerrillos','Cerro Navia','Estación Central','Lo Prado','Maipú','Pudahuel','Quinta Normal','Renca','Alhué','Curacaví','El Monte','Isla de Maipo','María Pinto','Melipilla','Padre Hurtado','Peñaflor','San Pedro','Talagante','Colina','Conchalí','Huechuraba','Independencia','Lampa','Quilicura','Recoleta','Til Til'];
				$i=1;
				while ($i <=52) {	

					$stage = new Stage();
					$stage->name = $data2[$i];
					$stage->type_stage_id = $type_stages1->id;
					$stage->amount_total = $data['comunal_'.$i];
					$stage->amount_spent = 0;
					$stage->save();
					$i++;
				}

					//Etapa Provincial
				$data2=[' ','CORDILLERA','TALAGANTE - MELIPILLA','SUR','NORTE','CENTRO','ORIENTE','PONIENTE'];
				$i=1;
				while ($i <=7) {	

					$stage = new Stage();
					$stage->name = $data2[$i];
					$stage->type_stage_id = $type_stages2->id;
					$stage->amount_total = $data['provincial_'.$i];
					$stage->amount_spent = 0;
					$stage->save();
					$i++;
				}

					//Etapa Regional
				$data2=[' ','ATLETISMO','NATACIÓN','TENIS DE MESA','CICLISMO','FÚTBOL','BÁSQUETBOL','VOLEIBOL','BALONMANO','ATLETISMO ADAPTADO','FUTSAL','JUDO','OTROS'];
				$i=1;
				while ($i <=12) {	

					$stage = new Stage();
					$stage->name = $data2[$i];
					$stage->type_stage_id = $type_stages3->id;
					$stage->amount_total = $data['regional_'.$i];
					$stage->amount_spent = 0;
					$stage->save();
					$i++;
				}
				
					//Etapa Nacional
				$data2=[' ','ATLETISMO','NATACIÓN','TENIS DE MESA','CICLISMO','FÚTBOL','BÁSQUETBOL','VOLEIBOL','BALONMANO','ATLETISMO ADAPTADO','FUTSAL','JUDO','OTROS'];
				$i=1;
				while ($i <=12) {	

					$stage = new Stage();
					$stage->name = $data2[$i];
					$stage->type_stage_id = $type_stages4->id;
					$stage->amount_total = $data['nacional_'.$i];
					$stage->amount_spent = 0;
					$stage->save();
					$i++;
				}

					//Etapa Nacional
				$data2=[' ','EVENTOS','LIGAS','COORDINACION JPRED'];
				$i=1;
				while ($i <=3) {	

					$stage = new Stage();
					$stage->name = $data2[$i];
					$stage->type_stage_id = $type_stages5->id;
					$stage->amount_total = $data['juegos_'.$i];
					$stage->amount_spent = 0;
					$stage->save();
					$i++;
				}

				flash('Se Creó Correctamente el Presupuesto.')->success();
				return redirect()->route('budgets.search');
			}
		}

	}
	public function update(Request $request, Budget $budget)
	{		


		if(auth()->user()->hasRole('Administrador')){

			$validator = Validator::make($request->all(), [
				'year' => 'required|digits:4|integer|min:1900',
				'amount_total' => 'required|integer',
				'numbers_employees' => 'required|max:255',         
			]);
			$budget = Budget::findOrFail($request->id);	
			$validator->sometimes('year', 'unique:budgets', function ($input) use ($budget) {				
				return strtolower($input->year) != strtolower($budget->year);
			});

			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}			
			else{

				$budget->year = $request->get('year');
				$budget->amount_total = $request->get('amount_total'); 
				$budget->numbers_employees = $request->get('numbers_employees');
				//Si el estado es activo , desactivamos en presupuesto activo.
				if($request['state']=='Activo')
				{
					$budgetActive= Budget::where('state', 'Activo')->get();
					 //Si no existe ningun activo
					if($budgetActive->count()>0){
						$budgetActive[0]->state='Inactivo';					 
						$budgetActive[0]->save();
					}					
				}
				else{

					if($budget->state=='Activo'){
						flash('Error, No se puede dejar sin un presupuesto activo. ')->error();
						return redirect()->back()->withErrors($validator->errors())->withInput();

					}
				}	
				$budget->state = $request->get('state');
				$budget->save();

				//Buscar componentes
				$components=Component::where('budget_id',$request->id)->get();
				
				if($components->count() >0){

					$components[0]->amount_total = $request->get('amount_school_competition');					
					$components[0]->numbers_employees = $request->get('employees_school_competition');	
					$components[0]->save();

					$components[1]->amount_total = $request->get('amount_federated_competition');					
					$components[1]->numbers_employees = $request->get('employees_federated_competition');	
					$components[1]->save();

					$components[2]->amount_total = $request->get('amount_school_sup_competition');					
					$components[2]->numbers_employees = $request->get('employees_school_sup_competition');	
					$components[2]->save();



			//datos tipos de etapa
					$typeStages1=TypeStage::where('component_id',$components[0]->id)->get();
					$typeStages2=TypeStage::where('component_id',$components[1]->id)->get();
					$typeStages3=TypeStage::where('component_id',$components[2]->id)->get();

			//Componente Escolar
					$typeStages1[0]->amount_total = $request->get('amount_stage_communal');			
					$typeStages1[0]->save();
					$typeStages1[1]->amount_total = $request->get('amount_stage_provincial');			
					$typeStages1[1]->save();
					$typeStages1[2]->amount_total = $request->get('amount_stage_regional');			
					$typeStages1[2]->save();
					$typeStages1[3]->amount_total = $request->get('amount_stage_national');			
					$typeStages1[3]->save();
					$typeStages1[4]->amount_total = $request->get('amount_stage_games');			
					$typeStages1[4]->save();
					$typeStages1[5]->amount_total = $request->get('amount_coordination');			
					$typeStages1[5]->save();
			//Componente Federado
					$typeStages2[0]->amount_total = $request->get('amount_stage_preparation');			
					$typeStages2[0]->save();
					$typeStages2[1]->amount_total = $request->get('amount_stage_participation');			
					$typeStages2[1]->save();
			//Componente Ligas de Educación superior
					$typeStages3[0]->amount_total = $request->get('amount_stage_regional_sup');			
					$typeStages3[0]->save();
					$typeStages3[1]->amount_total = $request->get('amount_stage_ldes');			
					$typeStages3[1]->save();	


			//datos etapas
					$stages1=Stage::where('type_stage_id',$typeStages1[0]->id)->get();
					$stages2=Stage::where('type_stage_id',$typeStages1[1]->id)->get();
					$stages3=Stage::where('type_stage_id',$typeStages1[2]->id)->get();
					$stages4=Stage::where('type_stage_id',$typeStages1[3]->id)->get();
					$stages5=Stage::where('type_stage_id',$typeStages1[4]->id)->get();


				//Etapa Comunal	
					$i=1;
					foreach ($stages1 as  $stage) {					
						$stage->amount_total =  $request->get('comunal_'.$i); 				
						$stage->save();
						$i++;
					}
					//Etapa Provincial				
					$i=1;
					foreach ($stages2 as  $stage) {					
						$stage->amount_total =  $request->get('provincial_'.$i); 				
						$stage->save();
						$i++;
					}
					//Etapa Regional				
					$i=1;
					foreach ($stages3 as  $stage) {					
						$stage->amount_total =  $request->get('regional_'.$i); 				
						$stage->save();
						$i++;
					}	
					//Etapa Nacional				
					$i=1;
					foreach ($stages4 as  $stage) {					
						$stage->amount_total =  $request->get('nacional_'.$i); 				
						$stage->save();
						$i++;
					}					
					//Etapa Juegos				
					$i=1;
					foreach ($stages5 as  $stage) {					
						$stage->amount_total =  $request->get('juegos_'.$i); 				
						$stage->save();
						$i++;
					}

					flash('Se Modificó Correctamente el Presupuesto.')->success();
					return redirect()->intended(route('budgets.search'));
				}
				else{
					flash('Error, Se encuentra el Presupuesto. ')->error();
					return redirect()->back()->withErrors($validator->errors())->withInput();

				}
			}

		}
	}

	public function destroy(Budget $budget){

		if(auth()->user()->hasRole('Administrador'))
		{
			if($budget->state=='Activo'){
				flash('No Se puede eliminar el presupuesto, ya que esta activo.')->error();
				return redirect()->intended(route('budgets.search'));
			}
			else{
				$contracts=Contract::where('budget_id',$budget->id)->get();
				if( $contracts->count()==0){

					$components=Component::where('budget_id',$budget->id)->get();

					$typeStages1=TypeStage::where('component_id',$components[0]->id)->get();
					$typeStages2=TypeStage::where('component_id',$components[1]->id)->get();
					$typeStages3=TypeStage::where('component_id',$components[2]->id)->get();
					$stages1=Stage::where('type_stage_id',$typeStages1[0]->id)->delete();
					$stages2=Stage::where('type_stage_id',$typeStages1[1]->id)->delete();
					$stages3=Stage::where('type_stage_id',$typeStages1[2]->id)->delete();
					$stages4=Stage::where('type_stage_id',$typeStages1[3]->id)->delete();
					$stages5=Stage::where('type_stage_id',$typeStages1[4]->id)->delete();
					$typeStages1=TypeStage::where('component_id',$components[0]->id)->delete();
					$typeStages2=TypeStage::where('component_id',$components[1]->id)->delete();
					$typeStages3=TypeStage::where('component_id',$components[2]->id)->delete();
					$components=Component::where('budget_id',$budget->id)->delete();
					$budget->delete();
				
				
					flash('Se eliminó Correctamente el Presupuesto.')->success();
					return redirect()->intended(route('budgets.search'));
				}
				else{
					flash('No Se puede eliminar el presupuesto, ya que contiene contratos.')->error();
					return redirect()->intended(route('budgets.search'));
				}
			}			
		}
	}
}
