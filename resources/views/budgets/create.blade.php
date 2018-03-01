@extends('layouts.home')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">            
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear Presupuesto </h2>                  
						<div class="clearfix"></div>
					</div>
					<div class="x_content">  
						<form class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/presupuestos/crear') }}">
							{!! csrf_field() !!}             
							<h4 class="section">Completar Información</h4>

							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year" >
									Año
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="year" type="number" pattern="\d{4}" class="form-control col-md-7 col-xs-12 @if($errors->has('year')) parsley-error @endif"
									name="year"  required>
									@if($errors->has('year'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('year') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>  
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_total" >
									Monto
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="amount_total" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_total')) parsley-error @endif"
									name="amount_total"  required>
									@if($errors->has('amount_total'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('amount_total') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>             
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="numbers_employees">
									Numero Máximo Empleados 
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="numbers_employees" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('numbers_employees')) parsley-error @endif"
									name="numbers_employees"  required>
									@if($errors->has('numbers_employees'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('numbers_employees') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>  
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Estado <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">  
									<select class='form-control' id='state' name="state" required="">
										<option value="">-- Por favor seleccione --</option>										
										<option value="Activo">Activo</option>	
										<option value="Inactivo">Inactivo</option>											
									</select>                      
								</div>
							</div>							
							<div class="item form-group">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">                        
										<a class="btn btn-primary" href="{{ URL::previous() }}"> Cancelar</a>
										<button id="send" type="submit" class="btn btn-success">Crear</button>
									</div>
								</div>
							</div>                   
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection