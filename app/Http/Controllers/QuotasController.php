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
use Illuminate\Support\Facades\Mail;
use App\Mail\ContratoApago;


class QuotasController extends Controller
{
	public function edit( $contract)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){
			//quotas del contrato

			$quotas = Quota::where('contract_id', $contract)
			->orderBy('date_to_pay', 'asc')              
			->get();
			
			$contract2=Contract::findOrFail($contract);
			

			return view('contracts.editQuota')->with('contract',$contract2)->with('quotas',$quotas);
		}
	}
	public function update(Quota $quota ,Request $request){  

		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){

			$validator = Validator::make($request->all(), [
				'number_ticket' => 'max:255',
				'date_memo_to_pay' => 'date_format:d/m/Y',
				'date_to_pay' => 'date_format:d/m/Y',
				'date_paid' => 'date_format:d/m/Y',
				'number_memo' => 'max:255',
				'number_certificate' => 'max:255',			
			]);         
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();				
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{
				$request= request()->all();
				
				if($request['state_quota']=='A Pago'){

					$quota=Quota::findOrFail($request['id']);	
					$quota->number_certificate=$request['number_certificate'];
					$quota->state_quota=$request['state_quota'];					
					$date=Carbon::createFromFormat('d/m/Y', $request['date_to_pay'])->format('d/m/Y');									
					$quota->date_to_pay=$date;					

					$contract=Contract::findOrFail($quota->contract_id);					
					$employee=Employee::findOrFail($contract->employee_id);
					$responsable=Responsable::findOrFail($contract->responsable_id);

					//enviar correo
					Mail::to($responsable->email,$responsable->names)
					->send(new ContratoApago($responsable,$quota,$employee));
					$date=Carbon::createFromFormat('d/m/Y', $request['date_to_pay']);
					$quota->date_to_pay=$date;					
					$quota->save();

					$quotas = Quota::where('contract_id', $contract->id)
					->orderBy('date_to_pay', 'asc')              
					->get();
					flash('Se modificó el estado de la cuota. Se envió correo a responsable.')->success();
					return redirect()->back();

				}
				else{
					
					$quota=Quota::findOrFail($request['id']);					
					$quota->number_ticket=$request['number_ticket'];
					$quota->number_memo=$request['number_memo'];	
					$quota->state_quota=$request['state_quota'];


					$date=Carbon::createFromFormat('d/m/Y', $request['date_memo_to_pay']);									
					$quota->date_memo_to_pay=$date;	
					$date2=Carbon::createFromFormat('d/m/Y', $request['date_paid']);									
					$quota->date_paid=$date2;
					$quota->save();				

					$contract=Contract::findOrFail($quota->contract_id);					
					$employee=Employee::findOrFail($contract->employee_id);
					$responsable=Responsable::findOrFail($contract->responsable_id);

					//agregar pago a contrato				
					$contract->amount_paid=	$contract->amount_paid+$quota->amount;	
					//verificar si estan todas  las cuotas pagadas
					$quotas = Quota::where('state_quota','!=','Pagado')					
					->get();
					//cambiamos el estado en el contrato
					if($quotas->count()==0){
						$contract->state_contract='Pagado';
					}
					$contract->save();	
					

					$quotas = Quota::where('contract_id', $contract->id)
					->orderBy('date_to_pay', 'asc')              
					->get();
					flash('Se modificó el estado de la cuota a Pagado.')->success();
					return redirect()->back();

				}
			}
		}
	}
}
