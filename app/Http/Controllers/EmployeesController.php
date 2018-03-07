<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afp;
use App\Health;
use App\Employee;
use App\Contract;
use Validator;
use Carbon\Carbon;
use Storage;

class EmployeesController extends Controller
{
	public function create()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			return view('employees.create')->with('afps',Afp::get())->with('healths',Health::get());
		}
	}

	public function search()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			$employeeAll= Employee::all();
			return view('employees.search')->with('employees',$employeeAll);
		}
	}

	public function edit(Employee $employee)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			return view('employees.edit')->with('afps',Afp::get())->with('healths',Health::get())->with('employee',$employee);
		}
	}

	public function show(Employee $employee)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			//contratos del empleado
			$contracts = Contract::where('employee_id', $employee->id)
               ->orderBy('created_at', 'desc')              
               ->get();			
               $date = Carbon::createFromFormat('Y-m-d', $employee->birth_date);
			//formato fecha
			$employee->birth_date=$date->format('d/m/Y');

			return view('employees.show')->with('employee',$employee)->with('contracts',$contracts);
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
				'rut' => 'required|unique:employees,rut',
				'email' => 'required|email|unique:employees,email',
				'commune' => 'required|max:255',				
				'profession' => 'required|max:255',
				'semesters' => 'max:255',
				'file_certificado' => 'mimes:jpeg,jpg,png,pdf|required|max:5000', 
				'file_cedula' => 'mimes:jpeg,jpg,png,pdf|required|max:5000',  
			]);         
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();				
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{
				
       			//obtenemos el campo file definido en el formulario y lo guardamos
				$file = $request->file('file_certificado'); 
				$nombre = $file->getClientOriginalName(); 
				$type = \File::extension($nombre);	
				$nombreCert = 'certificado_'.$request['rut'].'.'.$type;        
				\Storage::disk('local')->put($nombreCert,  \File::get($file));

         		//obtenemos el campo file definido en el formulario  lo guardamos
				$file = $request->file('file_cedula'); 
				$nombre = $file->getClientOriginalName(); 
				$type = \File::extension($nombre);	
				$nombreCed = 'cedula_'.$request['rut'].'.'.$type;        
				\Storage::disk('local')->put($nombreCed,  \File::get($file));

				$request= request()->all();
				$employee = new Employee();
				$employee->names = $request['names'];
				$employee->email = $request['email']; 
				$employee->last_name = $request['last_name'];  
				$employee->last_name_mother = $request['last_name_mother'];  
				$employee->rut = $request['rut'];  
				$employee->phone = $request['phone']; 
				$employee->address = $request['address'];  
				$date = Carbon::createFromFormat('d/m/Y', $request['birth_date']);
				$employee->birth_date = $date;       
				$employee->commune = $request['commune']; 
				$employee->profession = $request['profession']; 
				if($request['semesters']!=null){
					$employee->semesters = $request['semesters']; 
				}
				
				$employee->quality_studies = $request['quality_studies'];
				$employee->afp_id = $request['afp'];
				$employee->health_id = $request['health'];  
				$employee->url_certificate = $nombreCert; 
				$employee->url_identification = $nombreCed;
				$employee->save();
				flash('Se Creó Correctamente el empleado '.$employee->name.'.')->success();
				return redirect()->route('employees.search');
			}
		}
	}

	public function update(Request $request){       
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
				'commune' => 'required|max:255',				
				'profession' => 'required|max:255',
				'semesters' => 'max:255',
				'file_certificado' => 'mimes:jpeg,jpg,png,pdf|max:5000', 
				'file_cedula' => 'mimes:jpeg,jpg,png,pdf|max:5000',        
			]);
			$employee = Employee::findOrFail($request->id);
			$validator->sometimes('email', 'unique:employees', function ($input) use ($employee) {

				return strtolower($input->email) != strtolower($employee->email);
			});
			$validator->sometimes('rut', 'unique:employees', function ($input) use ($employee) {

				return strtolower($input->rut) != strtolower($employee->rut);
			});

			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput();
			}           
			else{

				if($request->has('file_certificado')){
					//obtenemos el campo file definido en el formulario y lo guardamos
					$file = $request->file('file_certificado'); 
					$nombre = $file->getClientOriginalName(); 
					$type = \File::extension($nombre);	
					$nombreCert = 'certificado_'.$request['rut'].'.'.$type;        
					\Storage::disk('local')->put($nombreCert,  \File::get($file));
					$employee->url_certificate = $nombreCert; 				
				}
				if($request->has('file_cedula')){
					//obtenemos el campo file definido en el formulario  lo guardamos
					$file = $request->file('file_cedula'); 
					$nombre = $file->getClientOriginalName(); 
					$type = \File::extension($nombre);	
					$nombreCed = 'cedula_'.$request['rut'].'.'.$type;        
					\Storage::disk('local')->put($nombreCed,  \File::get($file));				
					$employee->url_identification = $nombreCed;
				}				
				$request= request()->all();				
				$employee->names = $request['names'];
				$employee->email = $request['email']; 
				$employee->last_name = $request['last_name'];  
				$employee->last_name_mother = $request['last_name_mother'];  
				$employee->rut = $request['rut'];  
				$employee->phone = $request['phone']; 
				$employee->address = $request['address'];  
				$date = Carbon::createFromFormat('d/m/Y', $request['birth_date']);
				$employee->birth_date = $date;       
				$employee->commune = $request['commune']; 
				$employee->profession = $request['profession']; 
				if($request['semesters']!=null){
					$employee->semesters = $request['semesters']; 
				}
				else{
					$employee->semesters = null; 
				}
				$employee->quality_studies = $request['quality_studies'];
				$employee->afp_id = $request['afp'];
				$employee->health_id = $request['health']; 
				$employee->save();
				flash('Se Modificó Correctamente el empelado '.$employee->name.'.')->success();
				return redirect()->intended(route('employees.search'));
			}
		}
	}

	public function destroy(Employee $employee){

		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario'))
		{
			//elimina los archivos
			Storage::delete([$employee->url_identification, $employee->url_certificate]);
			$employee->delete();
			flash('Se eliminó Correctamente el empleado.')->success();
			return redirect()->intended(route('employees.search'));
		}
	}
}
