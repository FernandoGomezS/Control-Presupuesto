<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="{{ ltrim(elixir('assets/admin/css/bootstrap.min.css'), '/') }}" />   

	<title> FORMULARIO RR.HH PROGRAMAS {{ $budget_active }} </title>

</head>
<body>
	<div class="container">
		<b><u><h5 class="text-center">FORMULARIO RR.HH PROGRAMAS {{ $budget_active }} <br> DEPORTIVOS D.R.M. <br> HONORARIOS </h5></u></b><br>
		<br>
		<br>
		<br>
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Nombres: </b>{{ $contract->employees->names }}
			</div>
			<div class="col-xs-5 ">
				<b>Apellido Paterno: </b>{{ $contract->employees->last_name }}
			</div>
		</div>                
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>RUT: </b> {{ $contract->employees->rut }} 
			</div>
			<div class="col-xs-5 ">
				<b>Apellido Materno: </b>{{ $contract->employees->last_name_mother }}
			</div>
		</div>                
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Domicilio: </b>  {{ $contract->employees->address }}
			</div>
			<div class="col-xs-5 ">
				<b>Comuna: </b> {{ $contract->employees->commune }}
			</div>
		</div>
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>AFP: </b>    {{ $contract->employees->afps->name }}  
			</div>
			<div class="col-xs-5 ">
				<b>Salud: </b>  {{ $contract->employees->healths->name }}
			</div>
		</div>   
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Fecha de Nacimiento: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->employees->birth_date)->format('d/m/Y') }}
			</div>
			<div class="col-xs-5 ">
				<b>Edad: </b>   {{ \Carbon\Carbon::parse( $contract->employees->birth_date)->age }}
			</div>
		</div>   
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Teléfono: </b>{{ $contract->employees->phone}}
			</div>
			<div class="col-xs-5 ">
				<b>Correo: </b>{{ $contract->employees->email}}
			</div>
		</div>  
		<br>
		<br>
		<br>
		<div class="row">           
			<div class="col-xs-4 col-xs-offset-4">
				<hr><h5 class="text-center">Uso exclusivo UAF</h5><hr>
			</div>

		</div> 
		<br>
		<br>
		<div class="row">           
			<div class="col-xs-11 col-xs-offset-1">
				<b>Programa Deportivo: </b>{{ $contract->program }}
			</div> 
		</div> 
		<div class="row">
			<div class="col-xs-5 col-xs-offset-1">
				<b>Componente: </b>{{ $contract->type_stages->components->name }}
			</div>          
		</div>         
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Profesión u Oficio: </b>{{ $contract->employees->profession }}
			</div>
			<div class="col-xs-5 ">
				<b>Función: </b>{{ $contract->function }}
			</div>
		</div> 
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Calidad de Estudios: </b>{{ $contract->employees->quality_studies }} 
			</div>
			<div class="col-xs-5 ">
				@if($contract->employees->semesters!=null  )
				<b>Nº de Semestres Cursados: </b>{{ $contract->employees->semesters }}
				@endif
			</div>
		</div>
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Continuidad: </b>{{ $contract->duration}}
			</div>
			<div class="col-xs-5 ">
				<b>Nº de Horas Mensuales: </b>{{ $contract->hours}} 
			</div>
		</div>
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Monto Anual: </b>${{ number_format( $contract->amount_total,0,",",".") }}
			</div>
			<div class="col-xs-5 ">
				<b>Monto Mensual: </b>${{ number_format( $contract->amount_month,0,",",".") }}
			</div>
		</div>
		<div class="row">           
			<div class="col-xs-5 col-xs-offset-1">
				<b>Fecha Inicio Contrato: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y')}}
			</div>
			<div class="col-xs-5 ">
				<b>Fecha Término Contrato: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y')}}
			</div>
		</div> 
		<br>
		<hr>
		<br>
		<br>
		<br>
		<br>
		<div class="row">           
			<div class="col-xs-2 col-xs-offset-8">
				____________________<br>
				<b>&nbsp; &nbsp; &nbsp; Firma Analista</b>
			</div>           
		</div> 

	</div>                


</div>
</body>
</html>