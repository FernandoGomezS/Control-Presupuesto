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
            <div class="row">
                <div class="col-xs-6">
                    <b><u><h5 class="text-center">FORMULARIO RR.HH PROGRAMAS {{ $budget_active }} <br> DEPORTIVOS D.R.M. <br> HONORARIOS </h5></u></b>


<br>

<br><h4><b>Nombres: </b>{{ $contract->employees->names }}
<br><b>Apellido Paterno: </b>{{ $contract->employees->last_name }}
<br><b>Apellido Materno: </b>{{ $contract->employees->last_name_mother }}       
<br><b>RUT: </b>    {{ $contract->employees->rut }} 
<br><b>Domicilio: </b>  {{ $contract->employees->address }} 
<br><b>Comuna: </b> {{ $contract->employees->commune }}
<br><b>AFP: </b>    {{ $contract->employees->afps->name }}  
<br><b>Salud: </b>  {{ $contract->employees->healths->name }}
<br><b>Fecha de Nacimiento: </b>{{ $contract->employees->birth_date }}                                      
<br><b>Edad: </b>   {{ \Carbon\Carbon::parse( $contract->employees->birth_date)->age }} 
<br><b>Teléfono: </b>{{ $contract->employees->phone}}
<br><b>Correo: </b>{{ $contract->employees->email}}
<hr><h5 class="text-center">Uso exclusivo UAF</h5>
<br><b>Programa Deportivo: </b>{{ $contract->program }}
<br><b>Componente: </b>{{ $contract->type_stages->components->name }}
<br><b>Profesión u Oficio: </b>{{ $contract->employees->profession }}
<br><b>Calidad de Estudios: </b>{{ $contract->employees->quality_studies }}
<br><b>Función: </b>{{ $contract->function }}
@if($contract->employees->semesters!=null  )
<br><b>Nº de Semestres Cursados: </b>{{ $contract->employees->semesters }}
@endif
<br><b>Continuidad: </b>{{ $contract->duration}}
<br><b>Nº de Horas Mensuales: </b>{{ $contract->hours}} 
<br><b>Calidad de Estudios: </b>{{ $contract->employees->quality_studies }}
<br><b>Monto Anual: </b>${{ number_format( $contract->amount_total,0,",",".") }}
<br><b>Monto Mensual: </b>${{ number_format( $contract->amount_month,0,",",".") }}
<br><b>Fecha Inicio Contrato: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y')}}
<br><b>Fecha Término Contrato:</b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y')}}</h4>
                </div>
                <div class="col-xs-6">
                    <b><u><h5 class="text-center">FORMULARIO RR.HH PROGRAMAS {{ $budget_active }} <br> DEPORTIVOS D.R.M. <br> HONORARIOS </h5></u></b>


<br>

<br><h4><b>Nombres: </b>{{ $contract->employees->names }}
<br><b>Apellido Paterno: </b>{{ $contract->employees->last_name }}
<br><b>Apellido Materno: </b>{{ $contract->employees->last_name_mother }}       
<br><b>RUT: </b>    {{ $contract->employees->rut }} 
<br><b>Domicilio: </b>  {{ $contract->employees->address }} 
<br><b>Comuna: </b> {{ $contract->employees->commune }}
<br><b>AFP: </b>    {{ $contract->employees->afps->name }}  
<br><b>Salud: </b>  {{ $contract->employees->healths->name }}
<br><b>Fecha de Nacimiento: </b>{{ $contract->employees->birth_date }}                                      
<br><b>Edad: </b>   {{ \Carbon\Carbon::parse( $contract->employees->birth_date)->age }} 
<br><b>Teléfono: </b>{{ $contract->employees->phone}}
<br><b>Correo: </b>{{ $contract->employees->email}}
<hr><h5 class="text-center">Uso exclusivo UAF</h5>
<br><b>Programa Deportivo: </b>{{ $contract->program }}
<br><b>Componente: </b>{{ $contract->type_stages->components->name }}
<br><b>Profesión u Oficio: </b>{{ $contract->employees->profession }}
<br><b>Calidad de Estudios: </b>{{ $contract->employees->quality_studies }}
<br><b>Función: </b>{{ $contract->function }}
@if($contract->employees->semesters!=null  )
<br><b>Nº de Semestres Cursados: </b>{{ $contract->employees->semesters }}
@endif
<br><b>Continuidad: </b>{{ $contract->duration}}
<br><b>Nº de Horas Mensuales: </b>{{ $contract->hours}} 
<br><b>Calidad de Estudios: </b>{{ $contract->employees->quality_studies }}
<br><b>Monto Anual: </b>${{ number_format( $contract->amount_total,0,",",".") }}
<br><b>Monto Mensual: </b>${{ number_format( $contract->amount_month,0,",",".") }}
<br><b>Fecha Inicio Contrato: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y')}}
<br><b>Fecha Término Contrato:</b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y')}}</h4>
                </div>
            </div>
        </div>
    </body>
</html>