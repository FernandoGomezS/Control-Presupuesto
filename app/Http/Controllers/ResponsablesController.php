<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsable;
use Validator;
use Carbon\Carbon;
use App\Contract;

class ResponsablesController extends Controller
{
	public function create()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			return view('responsables.create');
		}
	}

	public function search()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			$responsablesAll= Responsable::all();

			return view('responsables.search')->with('responsables',$responsablesAll);
		}
	}

	public function edit(Responsable $responsable)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){

			
			$date = Carbon::createFromFormat('Y-m-d', $responsable->birth_date);
			//formato fecha
			$responsable->birth_date=$date->format('d/m/Y');
			return view('responsables.edit')->with('responsable',$responsable);
		}
	}

	public function show(Responsable $responsable)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){

			return view('responsables.show')->with('responsable',$responsable);
		}
	}

	public function store(Request $request)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){

			$validator = Validator::make($request->all(), [
				'names' => 'required|max:255',
				'last_name' => 'required|max:255',                
				'last_name_mother' => 'required|max:255',
				'address' => 'required|max:255',
				'birth_date' => 'required|date_format:d/m/Y',
				'phone' => 'required|max:255',
				'rut' => 'required|unique:responsables,rut',
				'email' => 'required|email|unique:responsables,email',          
			]);         
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{
				$request= request()->all();
				$responsable = new Responsable();
				$responsable->names = $request['names'];
				$responsable->email = $request['email']; 
				$responsable->last_name = $request['last_name'];  
				$responsable->last_name_mother = $request['last_name_mother'];  
				$responsable->rut = $request['rut'];  
				$responsable->address = $request['address'];  
				$date = Carbon::createFromFormat('d/m/Y', $request['birth_date']);
				$responsable->birth_date = $date;       
				$responsable->phone = $request['phone']; 
				$responsable->save();
				flash('Se Creó Correctamente el Responsable.')->success();
				return redirect()->route('responsables.search');
			}
		}
	}

	public function update(Request $request)
	{       



		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario') ){

			$validator = Validator::make($request->all(), [
				'names' => 'required|max:255',
				'last_name' => 'required|max:255',                
				'last_name_mother' => 'required|max:255',
				'address' => 'required|max:255',
				'birth_date' => 'required|date_format:d/m/Y',
				'phone' => 'required|max:255',
				'rut' => 'required|max:255',
				'email' => 'required|email|max:255',          
			]);
			$responsable = Responsable::findOrFail($request->id);
			$validator->sometimes('email', 'unique:responsables', function ($input) use ($responsable) {

				return strtolower($input->email) != strtolower($responsable->email);
			});
			$validator->sometimes('rut', 'unique:responsables', function ($input) use ($responsable) {

				return strtolower($input->rut) != strtolower($responsable->rut);
			});

			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{

				$responsable->names = $request->get('names');
				$responsable->email = $request->get('email'); 
				$responsable->last_name = $request->get('last_name');  
				$responsable->last_name_mother = $request->get('last_name_mother');  
				$responsable->rut = $request->get('rut');  
				$responsable->address = $request->get('address');	

				$date = Carbon::createFromFormat('d/m/Y', $request->get('birth_date'));

				$responsable->birth_date = $date;       
				$responsable->phone = $request->get('phone'); 
				$responsable->save();    

				flash('Se Modificó Correctamente el Responsable '.$responsable->name.'.')->success();
				return redirect()->intended(route('responsables.search'));
			}
		}
	}

	public function destroy(Responsable $responsable){

		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario'))
		{
			//buscamos si tiene contratos
			$contracts=Contract::where('responsable_id',$responsable->id)->get();
			if($contracts->count() > 0){
				//no se puede eliminar ya que tiene contratos
				flash('No Se puede eliminar el Responsable, ya que tiene Contratos activos actualmente.')->error();
				return redirect()->intended(route('responsables.search'));
			}
			else{
				//se elimina 
				$responsable->delete();
				flash('Se eliminó Correctamente el Responsable.')->success();
				return redirect()->intended(route('responsables.search'));
			}
		}
	}
}
