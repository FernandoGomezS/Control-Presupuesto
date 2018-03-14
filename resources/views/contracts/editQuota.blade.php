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
					@include('flash::message') 
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
								<div id="contract_datos2" class="col-sm-4 invoice-col">
									<address> 
										<br><b>Programa: </b>{{ $contract->program}}
										<br><b>Responsable: </b>{{ $contract->responsables->names.' '.$contract->responsables->last_name }}				
										<br><b>Fecha Inicio: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y')}}
										<br><b>Fecha Término: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y')}}
									</address>

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
												<th>Editar</th>
											</tr>
										</thead>
										<tbody>											
											@foreach( $quotas as $quota )  
											<tr>
												<td>{{$loop->iteration}}</td>
												@if( $quota->state_quota=='Por Pagar')
												<td><span class="label label-warning">{{ $quota->state_quota}}</span></td>	
												@endif
												@if( $quota->state_quota=='A Pago')
												<td><span class="label label label-info">{{ $quota->state_quota}}</span></td>	
												@endif
												@if( $quota->state_quota=='Pagado')
												<td><span class="label label label-success">{{ $quota->state_quota}}</span></td>	
												@endif
												@if( $quota->state_quota=='Anulada')
												<td><span class="label label label-danger">{{ $quota->state_quota}}</span></td>
												@endif
												<td>{{  \Carbon\Carbon::createFromFormat('Y-m-d', $quota->date_to_pay)->format('d/m/Y') }}</td>
												<td>$ {{ number_format($quota->amount,0,",",".")}}</td>	
												<td>
													<div class="btn-group">
														<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">Cambiar Estado <span class="caret"></span>
														</button>
														<ul role="menu" class="dropdown-menu">
															@if($quota->state_quota=='Por Pagar')
															<li><a data-toggle="modal" data-target="#modal-1" onclick="toPaid('{{ route('quotas.update', $quota) }}','{{ $quota->id }}')"  class=" delete-court-button" >A Pago</a>
															</li>
															@endif
															@if($quota->state_quota=='A Pago')
															<li><a  data-toggle="modal" data-target="#modal-2" onclick="paid('{{ route('quotas.update', $quota) }}','{{ $quota->id }}')"  class=" delete-court-button2">Pagado</a>
															</li>     
															@endif                   
														</ul>
													</div>															
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
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- modal -->

		<div class="modal fade bs-example-modal-lg"  id="modal-1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Editar Cuota A Pago</h4>
					</div>
					<form  id="delete-court-form" class="form-horizontal form-label-left" method="POST" action="">
						{{ csrf_field() }}
						{{ Form::hidden('state_quota', 'A Pago') }}
						{{ Form::hidden('id', 'cambiar ', array('id' => 'id_quota')) }}
						<div class="modal-body">					
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hours" >
									Nº de Certificado
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="number_certificate"  type="number" class="form-control col-md-7 col-xs-12 "
									name="number_certificate"  required> 											
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_start" >
									Fecha de Pago
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="date_to_pay" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 "
									name="date_to_pay"  required> 
									<ul id="errorDateToPay" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
									</ul>											
								</div>
							</div>	
						</div>
						<div class="modal-footer">	
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success " id="button_1"> Editar</button>  
						</div>
					</form> 

				</div>
			</div>
		</div>
		<!-- modal -->

		<div class="modal fade bs-example-modal-lg"  id="modal-2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Editar Cuota a Pagado</h4>
					</div>
					<form  id="delete-court-form" class="form-horizontal form-label-left" method="POST" action="">
						{{ csrf_field() }}
						{{ Form::hidden('state_quota', 'Pagado') }}  
						{{ Form::hidden('id', 'cambiar ', array('id' => 'id_quota2')) }}
						<div class="modal-body">					
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hours" >
									Nº de Boleta
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="number_ticket"  type="number" class="form-control col-md-7 col-xs-12 "
									name="number_ticket"  required> 											
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hours" >
									Nº de Memo a Pago
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="number_memo"  type="number" class="form-control col-md-7 col-xs-12 "
									name="number_memo"  required> 

								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_start" >
									Fecha de Memo a Pago
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="date_memo_to_pay" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 "
									name="date_memo_to_pay"  required>
									<ul id="errorDateMemoToPay" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
									</ul> 											
								</div>
							</div>	
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_start" >
									Fecha de Pago
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="date_paid" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 "
									name="date_paid"  required> 
									<ul id="errorDatePaid" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
									</ul>											
								</div>
							</div>	
						</div>
						<div class="modal-footer">	
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success " id="button_2"> Editar</button>  
						</div>
					</form> 

				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@endsection
@section('scripts')
<script src="{{asset('/assets/app/js/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('/assets/app/js/moment.js')}}"></script>
<script type="text/javascript">
	function toPaid(data,data2){

		$('#delete-court-form').attr('action', data);
		$('#id_quota').attr('value', data2);	
	}

	function paid(data,data2){

		$('#delete-court-form').attr('action', data);
		$('#id_quota2').attr('value', data2);	
	}


	$('#date_to_pay').keyup(function(){
		var date_to_pay = $('#date_to_pay').val();
		if( date_to_pay != "" ){     

			if( moment(date_to_pay , 'DD/MM/YYYY',true).isValid()){
				$('#errorDateToPay').addClass('hidden');
				$('#date_to_pay').removeClass('parsley-error');

				$('#button_1').prop('disabled', false);         
			}
			else{
				$('#errorDateToPay').removeClass('hidden');
				$('#date_to_pay').addClass('parsley-error');
				$('#button_1').prop('disabled', true);          
			}       
			$('#date_to_pay').val( date_to_pay );
		}
		else{            
			$('#date_to_pay').removeClass('parsley-error');
			$('#errorDateToPay').addClass('hidden');
			$('#button_1').prop('disabled', false);         
		}
	});

	$('#date_memo_to_pay').keyup(function(){
		var date_memo_to_pay = $('#date_memo_to_pay').val();
		if( date_memo_to_pay != "" ){     

			if( moment(date_memo_to_pay , 'DD/MM/YYYY',true).isValid()){
				$('#errorDateMemoToPay').addClass('hidden');
				$('#date_memo_to_pay').removeClass('parsley-error');
				var validate_date1 =$("#errorDatePaid").is(":visible");
				if(!validate_date1){
					$('#button_2').prop('disabled', false);  
				}

			}
			else{
				$('#errorDateMemoToPay').removeClass('hidden');
				$('#date_memo_to_pay').addClass('parsley-error');  
				$('#button_2').prop('disabled', true);         
			}       
			$('#date_memo_to_pay').val( date_memo_to_pay );
		}
		else{            
			$('#date_memo_to_pay').removeClass('parsley-error');
			$('#errorDateMemoToPay').addClass('hidden');
			var validate_date1 =$("#errorDatePaid").is(":visible");
			if(!validate_date1){
				$('#button_2').prop('disabled', false);  
			}       
		}
	});


	$('#date_paid').keyup(function(){
		var date_paid = $('#date_paid').val();
		if( date_paid != "" ){     

			if( moment(date_paid , 'DD/MM/YYYY',true).isValid()){
				$('#errorDatePaid').addClass('hidden');
				$('#date_paid').removeClass('parsley-error'); 
				var validate_date1 =$("#errorDateMemoToPay").is(":visible");
				if(!validate_date1){
					$('#button_2').prop('disabled', false);  
				}         
			}
			else{
				$('#errorDatePaid').removeClass('hidden');
				$('#date_paid').addClass('parsley-error');  
				$('#button_2').prop('disabled', true);         
			}       
			$('#date_paid').val( date_paid );
		}
		else{            
			$('#date_paid').removeClass('parsley-error');
			$('#errorDatePaid').addClass('hidden');
			var validate_date1 =$("#errorDateMemoToPay").is(":visible");
			if(!validate_date1){
				$('#button_2').prop('disabled', false);  
			}         
		}
	});

</script>

@endsection