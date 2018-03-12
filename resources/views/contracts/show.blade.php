@extends('layouts.home')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">		
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- title row -->
					<div class="x_title">
						<h2>
							<i class="fa fa-id-card-o" aria-hidden="true"></i> Contrato Nº {{ $contract->id }}

						</h2>
						<h3><small class="pull-right"><b>Estado: </b>{{ $contract->state_contract }}</small></h3> 
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<section class="content invoice">

							<!-- info row -->
							<div class="row invoice-info">
								<div id="contract_datos1" class="col-sm-4 invoice-col">
									<address> 
										<br><b>Empleado: </b>{{ $contract->employees->names.' '.$contract->employees->last_name}}
										<br><b>Rut: </b>	{{ $contract->employees->rut}}							
										<br><b>Teléfono: </b>{{ $contract->employees->phone}}
										<br><b>Correo: </b>{{ $contract->employees->email}}
									</address> 
								</div>
								<!-- /.col -->
								<div id="contract_datos2" class="col-sm-4 invoice-col">
									<address> 
										<br><b>Cargo: </b>{{ $contract->position}}
										<br><b>Función: </b>{{ $contract->function}}							
										<br><b>Deporte: </b>{{ $contract->sport}}
										<br><b>Continuidad: </b>{{ $contract->duration}}
									</address>

								</div>
								<!-- /.col -->
								<div id="contract_datos3" class="col-sm-4 invoice-col"> 																<address>
									<br><b>Monto Mensual: </b>{{ $contract->amount_month}}
									<br><b>Monto Anual: </b>{{ $contract->amount_year}}
								</address>
							</div> 														
						</div>
						<!-- /.row -->
						<!-- info row -->
						<div class="row invoice-info">
							<div id="contract_datos4" class="col-sm-4 invoice-col">
								<address> 
									<br><b>Cuotas: </b>{{ $contract->quotas}}
									<br><b>Horas Mensuales: </b>{{ $contract->hours}}							
									<br><b>Fecha Inicio: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y')}}
									<br><b>Fecha Término: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y')}}
								</address>
							</div>
							<!-- /.col -->
							<div id="contract_datos5" class="col-sm-4 invoice-col">
								<address> 
									<br><b>Programa: </b>{{ $contract->program}}
									<br><b>Responsable: </b>{{ $contract->responsables->names.' '.$contract->responsables->last_name }}
									
									<br><b>Competencia: </b>{{ $contract->type_stages->components->name}}
									<br><b>Tipo de Etapa: </b>{{ $contract->type_stages->name}}
								</address> 
							</div>
							<!-- /.col -->
							<div id="contract_datos6" class="col-sm-4 invoice-col">
								@if($contract->category!=null && $contract->stage_id!=null )
								<address> 
									<br><b>Etapa: </b>{{ $contract->stages->name }}	
									<br><b>Categoria: </b>{{ $contract->category }}										
								</address> 
								@endif
							</div>
							<!-- /.col -->

						</div>
						<!-- /.row -->
						<!-- Table row -->
						<div class="row">
							<div class="col-md-8 col-xs-12 table">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Cuota</th>
											<th>Estado</th>
											<th>Fecha de Pago</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>											
										@foreach( $quotas as $quota )  
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{ $quota->state_quota}}</td>
											<td>{{  \Carbon\Carbon::createFromFormat('Y-m-d', $quota->date_to_pay)->format('d/m/Y') }}</td>
											<td>$ {{ number_format($quota->amount,0,",",".")}}</td>			
										</tr>												
										@endforeach
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
						<div class="row">
							<!-- column -->
							<div class="col-md-8 col-xs-12 invoice-col">
							</div>
							<!-- /.col -->
							<div class="col-md-4 col-xs-12">
								<p class="lead">Resumen al {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<th>Pagado:</th>
											<td>$ {{ number_format($contract->amount_paid,0,",",".")}}</td>
										</tr>
										<tr>
											<th>Por pagar:</th>
											<td>$ {{ number_format($contract->amount_total-$contract->amount_paid,0,",",".")  }}</td>
										</tr>
										<tr>
											<th>Total:</th>
											<td>$ {{ number_format($contract->amount_total,0,",",".")}}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.col -->
					</div>
					 <a href="" class="btn btn-sm btn-primary">
            Descargar  en PDF
        </a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection