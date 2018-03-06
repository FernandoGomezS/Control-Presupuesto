<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afp;
use App\Health;
use App\Employee;
use Validator;
use Carbon\Carbon;

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
			
			return view('employees.search');
		}
	}

	public function edit()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			return view('employees.edit');
		}
	}

	public function show()
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario')){
			return view('employees.show');
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



       //obtenemos el campo file definido en el formulario
				 $file = $request->file('file_certificado'); 
				 $nombre = $file->getClientOriginalName(); 
				 $type = \File::extension($nombre);	
				 $nombreCert = 'certificado_'.$request['rut'].'.'.$type;        
				 \Storage::disk('local')->put($nombreCert,  \File::get($file));

         //obtenemos el campo file definido en el formulario
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
				$employee->afp_id = $request['afp'];
				$employee->health_id = $request['health'];  
				$employee->url_certificate = $nombreCert; 
				$employee->url_identification = $nombreCed;
				$employee->save();
				flash('Se Creó Correctamente el employee.')->success();
				return redirect()->route('employees.search');
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
				'birth_date' => 'required|max:255',
				'phone' => 'required|max:255',
				'rut' => 'required|max:255',
				'email' => 'required|email|max:255',          
			]);
			$employee = employee::findOrFail($request->id);
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

				$employee->names = $request->get('names');
				$employee->email = $request->get('email'); 
				$employee->last_name = $request->get('last_name');  
				$employee->last_name_mother = $request->get('last_name_mother');  
				$employee->rut = $request->get('rut');  
				$employee->address = $request->get('address');   

				$date = Carbon::createFromFormat('d/m/Y', $request->get('birth_date'));

				$employee->birth_date = $date;       
				$employee->phone = $request->get('phone'); 
				$employee->save();    

				flash('Se Modificó Correctamente el employee '.$employee->name.'.')->success();
				return redirect()->intended(route('employees.search'));
			}
		}
	}

	public function destroy(employee $employee){

		if(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Usuario'))
		{
			$employee->delete();
			flash('Se eliminó Correctamente el employee.')->success();
			return redirect()->intended(route('employees.search'));
		}
	}
}
