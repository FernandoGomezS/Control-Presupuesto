@extends('layouts.home')
@section('styles')
<link href="{{ asset('/assets/app/css/pnotify.css')}}" rel="stylesheet"> 
@endsection
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
						@include('flash::message')  
						<form class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/presupuestos/crear') }}">
							{!! csrf_field() !!} 
							<div id="wizard_verticle" class="form_wizard wizard_verticle">
								<ul class="list-unstyled wizard_steps">
									<li>
										<a href="#step-11">
											<span class="step_no">1</span>
										</a>
									</li>
									<li>
										<a href="#step-22">
											<span class="step_no">2</span>
										</a>
									</li>
									<li>
										<a href="#step-33">
											<span class="step_no">3</span>
										</a>
									</li>
									<li>
										<a href="#step-44">
											<span class="step_no">4</span>
										</a>
									</li>
								</ul>

								<div id="step-11">
									<h2 class="StepTitle">Paso 1 </h2>   
									<span class="section">Información General</span>								
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year" >
											Año
											<span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="year" type="number" value= "{{ old('year') }}"   class="form-control col-md-7 col-xs-12 @if($errors->has('year')) parsley-error @endif"
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
											Monto Total
											<span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input id="amount_total" value="{{ old('amount_total') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_total')) parsley-error @endif"
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
											<input id="numbers_employees" value="{{ old('numbers_employees') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('numbers_employees')) parsley-error @endif"
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">Estado <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">  
											<select class='form-control' id='state' name="state" required="">
												<option value="">-- Por favor seleccione --</option>									
												<option {{(old('state')=='Activo')?'selected' : ''}}  value="Activo">Activo</option>	
												<option {{(old('state')=='Inactivo')?'selected' : ''}} value="Inactivo">Inactivo</option>
											</select>                      
										</div>
									</div>	        

								</div>
								<div id="step-22">
									<h2 class="StepTitle">Paso 2 Competencias</h2>	
									<div class="pull-right">							
										<h2  id="amount_total_title" ></h2>																
										<h2  id="employes_total_title" ></h2>										
									</div>
									<br>
									<br>
									<span class="section">Competencia Escolar</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="numbers_employees">
											Empleados Máximos
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="employees_school_competition" value="{{ old('employees_school_competition') }}" type="number" class="form-control col-md-7 col-xs-12 "
											name="employees_school_competition"  required>
											@if($errors->has('employees_school_competition'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('employees_school_competition') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>								
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="numbers_employees">
											Monto Máximo
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_school_competition" value="{{ old('amount_school_competition') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_school_competition')) parsley-error @endif"
											name="amount_school_competition"  required>
											@if($errors->has('amount_school_competition'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_school_competition') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>
									</div>  
									<span class="section">Competencia Federada</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">
											Empleados Máximos
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="employees_federated_competition" value="{{ old('employees_federated_competition') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('employees_federated_competition')) parsley-error @endif"
											name="employees_federated_competition"  required>
											@if($errors->has('employees_federated_competition'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('employees_federated_competition') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>								
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_federated_competition">
											Monto Máximo
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_federated_competition" value="{{ old('amount_federated_competition') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_federated_competition')) parsley-error @endif"
											name="amount_federated_competition"  required>
											@if($errors->has('amount_federated_competition'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_federated_competition') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>
									</div> 
									<span class="section">Competencia  de Educación Superior</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employees_school_sup_competition">
											Empleados Máximos
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="employees_school_sup_competition" value="{{ old('employees_school_sup_competition') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('employees_school_sup_competition')) parsley-error @endif"
											name="employees_school_sup_competition"  required>
											@if($errors->has('employees_school_sup_competition'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('employees_school_sup_competition') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>								
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="namount_school_sup_competitions">
											Monto Máximo
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_school_sup_competition" value="{{ old('amount_school_sup_competition') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_school_sup_competition')) parsley-error @endif"
											name="amount_school_sup_competition"  required>
											@if($errors->has('amount_school_sup_competition'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_school_sup_competition') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>
									</div> 
									<br> 
								</div>


								<div id="step-33">
									<h2 class="StepTitle">Paso 3 Montos Tipos de Etapa</h2>
									<br>
									<span class="section">Competencia Escolar <h2 id="amount_school_value" class="pull-right">$ 10.000.000 </h2> </span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_communal">
											Etapa Comunal
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_stage_communal" value="{{ old('amount_stage_communal') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_communal')) parsley-error @endif"
											name="amount_stage_communal"  required>
											@if($errors->has('amount_stage_communal'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_stage_communal') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>								
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_provincial">
											Etapa Provincial
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_stage_provincial" value="{{ old('amount_stage_provincial') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_provincial')) parsley-error @endif"
											name="amount_stage_provincial"  required>
											@if($errors->has('amount_stage_provincial'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_stage_provincial') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>
									</div> 
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_regional">
											Etapa Regional
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_stage_regional" value="{{ old('amount_stage_regional') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_regional')) parsley-error @endif"
											name="amount_stage_regional"  required>
											@if($errors->has('amount_stage_regional'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_stage_regional') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>								
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_national">
											Etapa Nacional
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_stage_national" value="{{ old('amount_stage_national') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_national')) parsley-error @endif"
											name="amount_stage_national"  required>
											@if($errors->has('amount_stage_national'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_stage_national') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>
									</div> 
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_games">
											Juegos Pre Deportivos
											<span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<input id="amount_stage_games" value="{{ old('amount_stage_games') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_games')) parsley-error @endif"
											name="amount_stage_games"  required>
											@if($errors->has('amount_stage_games'))
											<ul class="parsley-errors-list filled">
												@foreach($errors->get('amount_stage_games') as $error)
												<li class="parsley-required">{{ $error }}</li>
												@endforeach
											</ul>
											@endif
										</div>	
									</div> 
									<span class="section">Competencia Federada <h2 id="amount_federated_value" class="pull-right">$ 15.000.000 </h2></span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_preparation
										">
										Preparación
										<span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<input id="amount_stage_preparation" value="{{ old('amount_stage_preparation') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_preparation')) parsley-error @endif"
										name="amount_stage_preparation"  required>
										@if($errors->has('amount_stage_preparation'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('amount_stage_preparation') as $error)
											<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
										@endif
									</div>								
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_participation">
										Participación
										<span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<input id="amount_stage_participation" value="{{ old('amount_stage_participation') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_participation')) parsley-error @endif"
										name="amount_stage_participation"  required>
										@if($errors->has('amount_stage_participation'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('amount_stage_participation') as $error)
											<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div> 
								<span class="section">Competencia  de Educación Superior <h2 id="amount_school_sup_value" class="pull-right"></h2></span>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_regional_sup">
										Regional
										<span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<input id="amount_stage_regional_sup" value="{{ old('amount_stage_regional_sup') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_regional_sup')) parsley-error @endif"
										name="amount_stage_regional_sup"  required>
										@if($errors->has('amount_stage_regional_sup'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('amount_stage_regional_sup') as $error)
											<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
										@endif
									</div>								
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_stage_ldes">
										Coordinación LDES
										<span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<input id="amount_stage_ldes" value="{{ old('amount_stage_ldes') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_stage_ldes')) parsley-error @endif"
										name="amount_stage_ldes"  required>
										@if($errors->has('amount_stage_ldes'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('amount_stage_ldes') as $error)
											<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div> 
							</div>


							<div id="step-44">
								<h2 class="StepTitle">Paso 4 Etapas</h2>
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
										<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Etapa Comunal</a>
										</li>
										<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Etapa Provincial</a>
										</li>
										<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Etapa Regional</a>
										</li>
										<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Etapa Nacional</a>
										</li>
										<li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pre Deportivos</a>
										</li>
									</ul>
									<div id="myTabContent" class="tab-content">
										<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
											<br>
											<span class="section">Etapa Comunal <h2 id="valueComunal" class="pull-right"> </h2> </span>
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_1">
													La Florida
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_1" value="{{ old('comunal_1') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_1')) parsley-error @endif"
													name="comunal_1"  required>
													@if($errors->has('comunal_1'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_1') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_2">
													La Pintana
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_2" value="{{ old('comunal_2') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('numbers_employees')) parsley-error @endif"
													name="comunal_2"  required>
													@if($errors->has('comunal_2'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_2') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_3">
													Pirque	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_3" value="{{ old('comunal_3') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_3')) parsley-error @endif"
													name="comunal_3"  required>
													@if($errors->has('comunal_3'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_3') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_4">
													Puente Alto	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_4" value="{{ old('comunal_4') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_4')) parsley-error @endif"
													name="comunal_4"  required>
													@if($errors->has('comunal_4'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_4') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_5">
													San José de Maipo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_5" value="{{ old('comunal_5') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_5')) parsley-error @endif"
													name="comunal_5"  required>
													@if($errors->has('comunal_5comunal_5'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_5') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_6">
													La Reina
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_6" value="{{ old('comunal_6') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_6')) parsley-error @endif"
													name="comunal_6"  required>
													@if($errors->has('comunal_6'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_6') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_7">
													Las Condes
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_7" value="{{ old('comunal_7') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_7')) parsley-error @endif"
													name="comunal_7"  required>
													@if($errors->has('comunal_7'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_7') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_8">
													Lo Barnechea	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_8" value="{{ old('comunal_8') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_8')) parsley-error @endif"
													name="comunal_8"  required>
													@if($errors->has('comunal_8'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_8') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_9">
													Macul	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_9" value="{{ old('comunal_9') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_9')) parsley-error @endif"
													name="comunal_9"  required>
													@if($errors->has('comunal_9'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_9') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div>
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_10">
													Ñuñoa
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_10" value="{{ old('comunal_10') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_10')) parsley-error @endif"
													name="comunal_10"  required>
													@if($errors->has('comunal_10'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_10') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_11">
													Peñalolén
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_11" value="{{ old('comunal_11') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_11')) parsley-error @endif"
													name="comunal_11"  required>
													@if($errors->has('comunal_11'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_11') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_12">
													Providencia
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_12" value="{{ old('comunal_12') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_12')) parsley-error @endif"
													name="comunal_12"  required>
													@if($errors->has('comunal_12'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_12') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_13">
													Vitacura
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_13" value="{{ old('comunal_13') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_13')) parsley-error @endif"
													name="comunal_13"  required>
													@if($errors->has('comunal_13'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_13') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_14">
													Pedro Aguirre Cerda
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_14" value="{{ old('comunal_14') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_14')) parsley-error @endif"
													name="comunal_14"  required>
													@if($errors->has('comunal_14'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_14') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_15">
													San Joaquín
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_15" value="{{ old('comunal_15') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_15')) parsley-error @endif"
													name="comunal_15"  required>
													@if($errors->has('comunal_15'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_15') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_16">
													San Miguel
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_16" value="{{ old('comunal_16') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_16')) parsley-error @endif"
													name="comunal_16"  required>
													@if($errors->has('comunal_16'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_16') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_17">
													Santiago
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_17" value="{{ old('comunal_17') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_17')) parsley-error @endif"
													name="comunal_17"  required>
													@if($errors->has('comunal_17'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_17') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_18">
													Buin
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_18" value="{{ old('comunal_18') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_18')) parsley-error @endif"
													name="comunal_18"  required>
													@if($errors->has('comunal_18'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_18') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_19">
													Calera de Tango	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_19" value="{{ old('comunal_19') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_19')) parsley-error @endif"
													name="comunal_19"  required>
													@if($errors->has('comunal_19'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_19') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_20">
													El Bosque
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_20" value="{{ old('comunal_20') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_20')) parsley-error @endif"
													name="comunal_20"  required>
													@if($errors->has('comunal_20'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_20') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_21">
													La Cisterna
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_21" value="{{ old('comunal_21') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_21')) parsley-error @endif"
													name="comunal_21"  required>
													@if($errors->has('comunal_21'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_21') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_22">
													La Granja
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_22" value="{{ old('comunal_22') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_22')) parsley-error @endif"
													name="comunal_22"  required>
													@if($errors->has('comunal_22'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_22') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_23">
													Lo Espejo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_23" value="{{ old('comunal_23') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_23')) parsley-error @endif"
													name="comunal_23"  required>
													@if($errors->has('comunal_23'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_23') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_24">
													Paine
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_24" value="{{ old('comunal_24') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_24')) parsley-error @endif"
													name="comunal_24"  required>
													@if($errors->has('comunal_24'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_24') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_25">
													San Bernardo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_25" value="{{ old('comunal_25') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_25')) parsley-error @endif"
													name="comunal_25"  required>
													@if($errors->has('comunal_25'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_25') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_26">
													San Ramón
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_26" value="{{ old('comunal_26') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_26')) parsley-error @endif"
													name="comunal_26"  required>
													@if($errors->has('comunal_26'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_26') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_27">
													Cerrillos
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_27" value="{{ old('comunal_27') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_27')) parsley-error @endif"
													name="comunal_27"  required>
													@if($errors->has('comunal_27'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_27') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_28">
													Cerro Navia
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_28" value="{{ old('comunal_28') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_28')) parsley-error @endif"
													name="comunal_28"  required>
													@if($errors->has('comunal_28'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_28') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_29">
													Estación Central	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_29" value="{{ old('comunal_29') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_29')) parsley-error @endif"
													name="comunal_29"  required>
													@if($errors->has('comunal_29'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_29') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_30">
													Lo Prado
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_30" value="{{ old('comunal_30') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_30')) parsley-error @endif"
													name="comunal_30"  required>
													@if($errors->has('comunal_30'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_30') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_31">
													Maipú
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_31" value="{{ old('comunal_31') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_31')) parsley-error @endif"
													name="comunal_31"  required>
													@if($errors->has('comunal_31'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_31') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_32">
													Pudahuel
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_32" value="{{ old('comunal_32') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_32')) parsley-error @endif"
													name="comunal_32"  required>
													@if($errors->has('comunal_32'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_32') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_33">
													Quinta Normal
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_33" value="{{ old('comunal_33') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_33')) parsley-error @endif"
													name="comunal_33"  required>
													@if($errors->has('comunal_33'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_33') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_34">
													Renca
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_34" value="{{ old('comunal_34') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_34')) parsley-error @endif"
													name="comunal_34"  required>
													@if($errors->has('comunal_34'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_34') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_35">
													Alhué	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_35" value="{{ old('comunal_35') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_35')) parsley-error @endif"
													name="comunal_35"  required>
													@if($errors->has('comunal_35'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_35') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_36">
													Curacaví
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_36" value="{{ old('comunal_36') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_36')) parsley-error @endif"
													name="comunal_36"  required>
													@if($errors->has('comunal_36'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_36') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_37">
													El Monte
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_37" value="{{ old('comunal_37') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_37')) parsley-error @endif"
													name="comunal_37"  required>
													@if($errors->has('comunal_37'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_37') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_38">
													Isla de Maipo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_38" value="{{ old('comunal_38') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_38')) parsley-error @endif"
													name="comunal_38"  required>
													@if($errors->has('comunal_38'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_38') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_39">
													María Pinto
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_39" value="{{ old('comunal_39') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_39')) parsley-error @endif"
													name="comunal_39"  required>
													@if($errors->has('comunal_39'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_39') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_40">
													Melipilla
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_40" value="{{ old('comunal_40') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_40')) parsley-error @endif"
													name="comunal_40"  required>
													@if($errors->has('comunal_40'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_40') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_41">
													Padre Hurtado
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_41" value="{{ old('comunal_41') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_41')) parsley-error @endif"
													name="comunal_41"  required>
													@if($errors->has('comunal_41'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_41') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_42">
													Peñaflor
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_42" value="{{ old('comunal_42') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_42')) parsley-error @endif"
													name="comunal_42"  required>
													@if($errors->has('comunal_42'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_42') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_43">
													San Pedro
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_43" value="{{ old('comunal_43') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_43')) parsley-error @endif"
													name="comunal_43"  required>
													@if($errors->has('comunal_43'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_43') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_44">
													Talagante
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_44" value="{{ old('comunal_44') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_44')) parsley-error @endif"
													name="comunal_44"  required>
													@if($errors->has('comunal_44'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_44') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_45">
													Colina	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_45" value="{{ old('comunal_45') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_45')) parsley-error @endif"
													name="comunal_45"  required>
													@if($errors->has('comunal_45'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_45') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_46">
													Conchalí
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_46" value="{{ old('comunal_46') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_46')) parsley-error @endif"
													name="comunal_46"  required>
													@if($errors->has('comunal_46'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_46') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_47">
													Huechuraba
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_47" value="{{ old('comunal_47') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_47')) parsley-error @endif"
													name="comunal_47"  required>
													@if($errors->has('comunal_47'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_47') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_48">
													Independencia
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_48" value="{{ old('comunal_48') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_48')) parsley-error @endif"
													name="comunal_48"  required>
													@if($errors->has('comunal_48'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_48') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_49">
													Lampa
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_49" value="{{ old('comunal_49') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_49')) parsley-error @endif"
													name="comunal_49"  required>
													@if($errors->has('comunal_49'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_49') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_50">
													Quilicura
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_50" value="{{ old('comunal_50') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_50')) parsley-error @endif"
													name="comunal_50"  required>
													@if($errors->has('comunal_50'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_50') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_51">
													Recoleta
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_51" value="{{ old('comunal_51') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_51')) parsley-error @endif"
													name="comunal_51"  required>
													@if($errors->has('comunal_51'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_51') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>		
											</div>
											<div class="item form-group">																			
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="comunal_52">
													Til Til	
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="comunal_52" value="{{ old('comunal_52') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('comunal_52')) parsley-error @endif"
													name="comunal_52"  required>
													@if($errors->has('comunal_52'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('comunal_52') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												
											</div>
										</div>


										<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
											<br>
											<span class="section">Etapa Provincial <h2 id="valueProvincial" class="pull-right">$ 10.000.000 </h2> </span>
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_1">
													Codillera
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_1" value="{{ old('provincial_1') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_1')) parsley-error @endif"
													name="provincial_1"  required>
													@if($errors->has('provincial_1'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_1') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_2">
													Talagante - Melipilla
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_2" value="{{ old('provincial_2') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_2')) parsley-error @endif"
													name="provincial_2"  required>
													@if($errors->has('provincial_2'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_2') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_3">
													Sur
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_3" value="{{ old('provincial_3') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_3')) parsley-error @endif"
													name="provincial_3"  required>
													@if($errors->has('provincial_3'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_3') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_4">
													Norte
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_4" value="{{ old('provincial_4') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_4')) parsley-error @endif"
													name="provincial_4"  required>
													@if($errors->has('provincial_4'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_4') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_5">
													Centro
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_5" value="{{ old('provincial_5') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_5')) parsley-error @endif"
													name="provincial_5"  required>
													@if($errors->has('provincial_5'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_5') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_6">
													Oriente
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_6" value="{{ old('provincial_6') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_6')) parsley-error @endif"
													name="provincial_6"  required>
													@if($errors->has('provincial_6'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_6') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="provincial_7">
													Poniente
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="provincial_7" value="{{ old('provincial_7') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('provincial_7')) parsley-error @endif"
													name="provincial_7"  required>
													@if($errors->has('provincial_7'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('provincial_7') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
										</div>


										<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
											<br>
											<span class="section">Etapa Regional <h2 id="valueRegional" class="pull-right">$ 10.000.000 </h2> </span>
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_1">
													Atletismo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_1" value="{{ old('regional_1') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_1')) parsley-error @endif"
													name="regional_1"  required>
													@if($errors->has('regional_1'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_1') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_2">
													Natación
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_2" value="{{ old('regional_2') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_2')) parsley-error @endif"
													name="regional_2"  required>
													@if($errors->has('regional_2'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_2') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_3">
													Tenis de Mesa
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_3" value="{{ old('regional_3') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_3')) parsley-error @endif"
													name="regional_3"  required>
													@if($errors->has('regional_3'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_3') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_4">
													Ciclismo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_4" value="{{ old('regional_4') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_4')) parsley-error @endif"
													name="regional_4"  required>
													@if($errors->has('regional_3'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_4') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_5">
													Fútbol
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_5" value="{{ old('regional_5') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_5')) parsley-error @endif"
													name="regional_5"  required>
													@if($errors->has('regional_5'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_5') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_6">
													Básquetbol
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_6" value="{{ old('regional_6') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_6')) parsley-error @endif"
													name="regional_6"  required>
													@if($errors->has('regional_6'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_6') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_7">
													Voleibol
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_7" value="{{ old('regional_7') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_7')) parsley-error @endif"
													name="regional_7"  required>
													@if($errors->has('regional_7'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_7') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_8">
													Balonmano
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_8" value="{{ old('regional_8') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_8')) parsley-error @endif"
													name="regional_8"  required>
													@if($errors->has('regional_8'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_8') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_9">
													Atletismo Adaptado
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_9" value="{{ old('regional_9') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_9')) parsley-error @endif"
													name="regional_9"  required>
													@if($errors->has('regional_9'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_9') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_10">
													Futsal
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_10" value="{{ old('regional_10') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_10')) parsley-error @endif"
													name="regional_10"  required>
													@if($errors->has('regional_10'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_10') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_11">
													Judo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_11" value="{{ old('regional_11') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_11')) parsley-error @endif"
													name="regional_11"  required>
													@if($errors->has('regional_11'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_11') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="regional_12">
													Otros
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="regional_12" value="{{ old('regional_12') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('regional_12')) parsley-error @endif"
													name="regional_12"  required>
													@if($errors->has('regional_12'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('regional_12') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
										</div>


										<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
											<br>
											<span class="section">Etapa Nacional <h2 id="valueNacional" class="pull-right">$ 10.000.000 </h2> </span>
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_1">
													Atletismo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_1" value="{{ old('nacional_1') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_1')) parsley-error @endif"
													name="nacional_1"  required>
													@if($errors->has('nacional_1'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_1') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_2">
													Natación
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_2" value="{{ old('nacional_2') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_2')) parsley-error @endif"
													name="nacional_2"  required>
													@if($errors->has('nacional_2'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_2') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_3">
													Tenis de Mesa
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_3" value="{{ old('nacional_3') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_3')) parsley-error @endif"
													name="nacional_3"  required>
													@if($errors->has('nacional_3'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_3') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_4">
													Ciclismo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_4" value="{{ old('nacional_4') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_4')) parsley-error @endif"
													name="nacional_4"  required>
													@if($errors->has('nacional_4'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_4') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_5">
													Fútbol
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_5" value="{{ old('nacional_5') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_5')) parsley-error @endif"
													name="nacional_5"  required>
													@if($errors->has('nacional_5'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_5') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_6">
													Básquetbol
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_6" value="{{ old('nacional_6') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_6')) parsley-error @endif"
													name="nacional_6"  required>
													@if($errors->has('nacional_6'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_6') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_7">
													Voleibol
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_7" value="{{ old('nacional_7') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_7')) parsley-error @endif"
													name="nacional_7"  required>
													@if($errors->has('nacional_7'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_7') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_8">
													Balonmano
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_8" value="{{ old('nacional_8') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_8')) parsley-error @endif"
													name="nacional_8"  required>
													@if($errors->has('nacional_8'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_8') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_9">
													Atletismo Adaptado
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_9" value="{{ old('nacional_9') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_9')) parsley-error @endif"
													name="nacional_9"  required>
													@if($errors->has('nacional_9'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_9') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_10">
													Futsal
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_10" value="{{ old('nacional_10') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_10')) parsley-error @endif"
													name="nacional_10"  required>
													@if($errors->has('nacional_10'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_10') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_11">
													Judo
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_11" value="{{ old('nacional_11') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_11')) parsley-error @endif"
													name="nacional_11"  required>
													@if($errors->has('nacional_11'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_11') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="nacional_12">
													Otros
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="nacional_12" value="{{ old('nacional_12') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('nacional_12')) parsley-error @endif"
													name="nacional_12"  required>
													@if($errors->has('nacional_12'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('nacional_12') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
										</div>


										<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
											<br>
											<span class="section">Juegos PreDeportivos Escolares <h2 id="valueEscolares" class="pull-right">$ 10.000.000 </h2> </span>
											<div class="item form-group">
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="juegos_1">
													Eventos
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="juegos_1" value="{{ old('juegos_1') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('juegos_1')) parsley-error @endif"
													name="juegos_1"  required>
													@if($errors->has('juegos_1'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('juegos_1') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>								
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="juegos_2">
													Ligas
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="juegos_2" value="{{ old('juegos_2') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('juegos_2')) parsley-error @endif"
													name="juegos_2"  required>
													@if($errors->has('juegos_2'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('juegos_2') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>
												<label class="control-label col-md-2 col-sm-3 col-xs-12" for="juegos_3">
													Coordinación JPRED
													<span class="required">*</span>
												</label>
												<div class="col-md-2 col-sm-6 col-xs-12">
													<input id="juegos_3" value="{{ old('juegos_3') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('juegos_3')) parsley-error @endif"
													name="juegos_3"  required>
													@if($errors->has('juegos_3'))
													<ul class="parsley-errors-list filled">
														@foreach($errors->get('juegos_3') as $error)
														<li class="parsley-required">{{ $error }}</li>
														@endforeach
													</ul>
													@endif
												</div>	
											</div> 
										</div>
									</div>
								</div>
							</div>
						</div>						
						<!-- End SmartWizard Content -->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /page content -->
@endsection
@section('scripts')
<script src="{{ asset('/assets/app/js/jquery.smartWizard.js')}}"></script>
<script src="{{ asset('/assets/app/js/pnotify.js')}}"></script>
<script type="text/javascript">

	//validacion etapa 2
	$('#amount_school_competition').keyup(function(){
		validationCompetition();
	});

	$('#amount_federated_competition').keyup(function(){
		validationCompetition();
	});

	$('#amount_school_sup_competition').keyup(function(){
		validationCompetition();
	});

	function validationCompetition(){
		var amount_school_competition = $("#amount_school_competition").val();
		var amount_federated_competition = $("#amount_federated_competition").val();
		var amount_school_sup_competition = $("#amount_school_sup_competition").val();
		var total=$("#amount_total").val()-amount_school_sup_competition-amount_federated_competition-amount_school_competition;
		$("#amount_total_title").html("Monto Disponible $"+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));	};

		$('#employees_school_competition').keyup(function(){
			validationEmployee();
		});

		$('#employees_federated_competition').keyup(function(){
			validationEmployee();
		});

		$('#employees_school_sup_competition').keyup(function(){
			validationEmployee();
		});
		function validationEmployee(){
			var employees_school_competition = $("#employees_school_competition").val();
			var employees_federated_competition= $("#employees_federated_competition").val();
			var employees_school_sup_competition = $("#employees_school_sup_competition").val();
			var total=$("#numbers_employees").val()-employees_school_sup_competition-employees_federated_competition-employees_school_competition;
			$("#employes_total_title").html("Empleados Disponibles: "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
		};

     //validacion etapa 3
     $('#amount_stage_communal').keyup(function(){
     	validationEscolar();
     });
     $('#amount_stage_provincial').keyup(function(){
     	validationEscolar();
     });
     $('#amount_stage_regional').keyup(function(){
     	validationEscolar();
     });
     $('#amount_stage_national').keyup(function(){
     	validationEscolar();
     });
     $('#amount_stage_games').keyup(function(){
     	validationEscolar();
     });

     function validationEscolar(){
     	var amount_stage_communal = $("#amount_stage_communal").val();
     	var amount_stage_provincial = $("#amount_stage_provincial").val();
     	var amount_stage_regional = $("#amount_stage_regional").val();
     	var amount_stage_national = $("#amount_stage_national").val();
     	var amount_stage_games = $("#amount_stage_games").val();
     	var total=$("#amount_school_competition").val()-amount_stage_communal-amount_stage_provincial-amount_stage_regional-amount_stage_national-amount_stage_games;
     	$("#amount_school_value").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     };


     $('#amount_stage_preparation').keyup(function(){
     	validationFederada();
     });
     $('#amount_stage_participation').keyup(function(){
     	validationFederada();
     });       

     function validationFederada(){
     	var amount_stage_preparation = $("#amount_stage_preparation").val();
     	var amount_stage_participation = $("#amount_stage_participation").val();
     	var total=$("#amount_federated_competition").val()-amount_stage_preparation-amount_stage_participation;
     	$("#amount_federated_value").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     };

     $('#amount_stage_regional_sup').keyup(function(){
     	validationGames();
     });
     $('#amount_stage_ldes').keyup(function(){
     	validationGames();
     });       

     function validationGames(){
     	var amount_stage_regional_sup = $("#amount_stage_regional_sup").val();
     	var amount_stage_ldes = $("#amount_stage_ldes").val();
     	var total=$("#amount_school_sup_competition").val()-amount_stage_regional_sup-amount_stage_ldes;
     	$("#amount_school_sup_value").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     };

     //validacion etapa 4

     $('#comunal_1').keyup(function(){ validationComunal(); }); 
     $('#comunal_2').keyup(function(){ validationComunal(); }); 
     $('#comunal_3').keyup(function(){ validationComunal(); }); 
     $('#comunal_4').keyup(function(){ validationComunal(); }); 
     $('#comunal_5').keyup(function(){ validationComunal(); }); 
     $('#comunal_6').keyup(function(){ validationComunal(); }); 
     $('#comunal_7').keyup(function(){ validationComunal(); }); 
     $('#comunal_8').keyup(function(){ validationComunal(); }); 
     $('#comunal_9').keyup(function(){ validationComunal(); }); 
     $('#comunal_10').keyup(function(){ validationComunal(); }); 
     $('#comunal_11').keyup(function(){ validationComunal(); }); 
     $('#comunal_12').keyup(function(){ validationComunal(); }); 
     $('#comunal_13').keyup(function(){ validationComunal(); }); 
     $('#comunal_14').keyup(function(){ validationComunal(); }); 
     $('#comunal_15').keyup(function(){ validationComunal(); }); 
     $('#comunal_16').keyup(function(){ validationComunal(); }); 
     $('#comunal_17').keyup(function(){ validationComunal(); }); 
     $('#comunal_18').keyup(function(){ validationComunal(); }); 
     $('#comunal_19').keyup(function(){ validationComunal(); }); 
     $('#comunal_20').keyup(function(){ validationComunal(); }); 
     $('#comunal_21').keyup(function(){ validationComunal(); }); 
     $('#comunal_22').keyup(function(){ validationComunal(); }); 
     $('#comunal_23').keyup(function(){ validationComunal(); }); 
     $('#comunal_24').keyup(function(){ validationComunal(); }); 
     $('#comunal_25').keyup(function(){ validationComunal(); }); 
     $('#comunal_26').keyup(function(){ validationComunal(); }); 
     $('#comunal_27').keyup(function(){ validationComunal(); }); 
     $('#comunal_28').keyup(function(){ validationComunal(); }); 
     $('#comunal_29').keyup(function(){ validationComunal(); }); 
     $('#comunal_30').keyup(function(){ validationComunal(); }); 
     $('#comunal_31').keyup(function(){ validationComunal(); }); 
     $('#comunal_32').keyup(function(){ validationComunal(); }); 
     $('#comunal_33').keyup(function(){ validationComunal(); }); 
     $('#comunal_34').keyup(function(){ validationComunal(); }); 
     $('#comunal_35').keyup(function(){ validationComunal(); }); 
     $('#comunal_36').keyup(function(){ validationComunal(); }); 
     $('#comunal_37').keyup(function(){ validationComunal(); }); 
     $('#comunal_38').keyup(function(){ validationComunal(); }); 
     $('#comunal_39').keyup(function(){ validationComunal(); }); 
     $('#comunal_40').keyup(function(){ validationComunal(); }); 
     $('#comunal_41').keyup(function(){ validationComunal(); }); 
     $('#comunal_42').keyup(function(){ validationComunal(); }); 
     $('#comunal_43').keyup(function(){ validationComunal(); }); 
     $('#comunal_44').keyup(function(){ validationComunal(); }); 
     $('#comunal_45').keyup(function(){ validationComunal(); }); 
     $('#comunal_46').keyup(function(){ validationComunal(); }); 
     $('#comunal_47').keyup(function(){ validationComunal(); }); 
     $('#comunal_48').keyup(function(){ validationComunal(); }); 
     $('#comunal_49').keyup(function(){ validationComunal(); }); 
     $('#comunal_50').keyup(function(){ validationComunal(); }); 
     $('#comunal_51').keyup(function(){ validationComunal(); }); 
     $('#comunal_52').keyup(function(){ validationComunal(); });

     function validationComunal(){
     	var comunal_1 = $("#comunal_1").val();
     	var comunal_2 = $("#comunal_2").val();
     	var comunal_3 = $("#comunal_3").val();
     	var comunal_4 = $("#comunal_4").val();
     	var comunal_5 = $("#comunal_5").val();
     	var comunal_6 = $("#comunal_6").val();
     	var comunal_7 = $("#comunal_7").val();
     	var comunal_8 = $("#comunal_8").val();
     	var comunal_9 = $("#comunal_9").val();
     	var comunal_10 = $("#comunal_10").val();
     	var comunal_11 = $("#comunal_11").val();
     	var comunal_12 = $("#comunal_12").val();
     	var comunal_13 = $("#comunal_13").val();
     	var comunal_14 = $("#comunal_14").val();
     	var comunal_15 = $("#comunal_15").val();
     	var comunal_16 = $("#comunal_16").val();
     	var comunal_17 = $("#comunal_17").val();
     	var comunal_18 = $("#comunal_18").val();
     	var comunal_19 = $("#comunal_19").val();
     	var comunal_20 = $("#comunal_20").val();
     	var comunal_21 = $("#comunal_21").val();
     	var comunal_22 = $("#comunal_22").val();
     	var comunal_23 = $("#comunal_23").val();
     	var comunal_24 = $("#comunal_24").val();
     	var comunal_25 = $("#comunal_25").val();
     	var comunal_26 = $("#comunal_26").val();
     	var comunal_27 = $("#comunal_27").val();
     	var comunal_28 = $("#comunal_28").val();
     	var comunal_29 = $("#comunal_29").val();
     	var comunal_30 = $("#comunal_30").val();
     	var comunal_31 = $("#comunal_31").val();
     	var comunal_32 = $("#comunal_32").val();
     	var comunal_33 = $("#comunal_33").val();
     	var comunal_34 = $("#comunal_34").val();
     	var comunal_35 = $("#comunal_35").val();
     	var comunal_36 = $("#comunal_36").val();
     	var comunal_37 = $("#comunal_37").val();
     	var comunal_38 = $("#comunal_38").val();
     	var comunal_39 = $("#comunal_39").val();
     	var comunal_40 = $("#comunal_40").val();
     	var comunal_41 = $("#comunal_41").val();
     	var comunal_42 = $("#comunal_42").val();
     	var comunal_43 = $("#comunal_43").val();
     	var comunal_44 = $("#comunal_44").val();
     	var comunal_45 = $("#comunal_45").val();
     	var comunal_46 = $("#comunal_46").val();
     	var comunal_47 = $("#comunal_47").val();
     	var comunal_48 = $("#comunal_48").val();
     	var comunal_49 = $("#comunal_49").val();
     	var comunal_50 = $("#comunal_50").val();
     	var comunal_51 = $("#comunal_51").val();
     	var comunal_52 = $("#comunal_52").val();
     	
     	var total=$("#amount_stage_communal").val()-comunal_1-comunal_2-comunal_3-comunal_4-comunal_5-comunal_6-comunal_7-comunal_8-comunal_9-comunal_10-comunal_11-comunal_12-comunal_13-comunal_14-comunal_15-comunal_16-comunal_17-comunal_18-comunal_19-comunal_20-comunal_21-comunal_22-comunal_23-comunal_24-comunal_25-comunal_26-comunal_27-comunal_28-comunal_29-comunal_30-comunal_31-comunal_32-comunal_33-comunal_34-comunal_35-comunal_36-comunal_37-comunal_38-comunal_39-comunal_40-comunal_41-comunal_42-comunal_43-comunal_44-comunal_45-comunal_46-comunal_47-comunal_48-comunal_49-comunal_50-comunal_51-comunal_52;
     	$("#valueComunal").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     }; 


     $('#provincial_1').keyup(function(){ validationProvincial(); });
     $('#provincial_2').keyup(function(){ validationProvincial(); });
     $('#provincial_3').keyup(function(){ validationProvincial(); });
     $('#provincial_4').keyup(function(){ validationProvincial(); });
     $('#provincial_5').keyup(function(){ validationProvincial(); });
     $('#provincial_6').keyup(function(){ validationProvincial(); });
     $('#provincial_7').keyup(function(){ validationProvincial(); });

     function validationProvincial(){
     	var provincial_1 = $("#provincial_1").val();
     	var provincial_2 = $("#provincial_2").val();
     	var provincial_3 = $("#provincial_3").val();
     	var provincial_4 = $("#provincial_4").val();
     	var provincial_5 = $("#provincial_5").val();
     	var provincial_6 = $("#provincial_6").val();
     	var provincial_7 = $("#provincial_7").val();
     	var total=$("#amount_stage_provincial").val()-provincial_1-provincial_2-provincial_3-provincial_4-provincial_5-provincial_6-provincial_7;
     	$("#valueProvincial").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     }

     $('#regional_1').keyup(function(){ validationRegional(); });
     $('#regional_2').keyup(function(){ validationRegional(); });
     $('#regional_3').keyup(function(){ validationRegional(); });
     $('#regional_4').keyup(function(){ validationRegional(); });
     $('#regional_5').keyup(function(){ validationRegional(); });
     $('#regional_6').keyup(function(){ validationRegional(); });
     $('#regional_7').keyup(function(){ validationRegional(); });
     $('#regional_8').keyup(function(){ validationRegional(); });
     $('#regional_9').keyup(function(){ validationRegional(); });
     $('#regional_10').keyup(function(){ validationRegional(); });
     $('#regional_11').keyup(function(){ validationRegional(); });
     $('#regional_12').keyup(function(){ validationRegional(); });    

     function validationRegional(){
     	var regional_1 = $("#regional_1").val();
     	var regional_2 = $("#regional_2").val();
     	var regional_3 = $("#regional_3").val();
     	var regional_4 = $("#regional_4").val();
     	var regional_5 = $("#regional_5").val();
     	var regional_6 = $("#regional_6").val();
     	var regional_7 = $("#regional_7").val();
     	var regional_8 = $("#regional_8").val();
     	var regional_9 = $("#regional_9").val();
     	var regional_10 = $("#regional_10").val();
     	var regional_11 = $("#regional_11").val();
     	var regional_12 = $("#regional_12").val();

     	var total=$("#amount_stage_regional").val()-regional_1-regional_2-regional_3-regional_4-regional_5-regional_6-regional_7-regional_8-regional_9-regional_10-regional_11-regional_12;
     	$("#valueRegional").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     }

     $('#nacional_1').keyup(function(){ validationNacional(); });
     $('#nacional_2').keyup(function(){ validationNacional(); });
     $('#nacional_3').keyup(function(){ validationNacional(); });
     $('#nacional_4').keyup(function(){ validationNacional(); });
     $('#nacional_5').keyup(function(){ validationNacional(); });
     $('#nacional_6').keyup(function(){ validationNacional(); });
     $('#nacional_7').keyup(function(){ validationNacional(); });
     $('#nacional_8').keyup(function(){ validationNacional(); });
     $('#nacional_9').keyup(function(){ validationNacional(); });
     $('#nacional_10').keyup(function(){ validationNacional(); });
     $('#nacional_11').keyup(function(){ validationNacional(); });
     $('#nacional_12').keyup(function(){ validationNacional(); });    

     function validationNacional(){
     	var nacional_1 = $("#nacional_1").val();
     	var nacional_2 = $("#nacional_2").val();
     	var nacional_3 = $("#nacional_3").val();
     	var nacional_4 = $("#nacional_4").val();
     	var nacional_5 = $("#nacional_5").val();
     	var nacional_6 = $("#nacional_6").val();
     	var nacional_7 = $("#nacional_7").val();
     	var nacional_8 = $("#nacional_8").val();
     	var nacional_9 = $("#nacional_9").val();
     	var nacional_10 = $("#nacional_10").val();
     	var nacional_11 = $("#nacional_11").val();
     	var nacional_12 = $("#nacional_12").val();

     	var total=$("#amount_stage_national").val()-nacional_1-nacional_2-nacional_3-nacional_4-nacional_5-nacional_6-nacional_7-nacional_8-nacional_9-nacional_10-nacional_11-nacional_12;
     	$("#valueNacional").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
     }

     $('#juegos_1').keyup(function(){ validationDeportivos(); });
     $('#juegos_2').keyup(function(){ validationDeportivos(); });
     $('#juegos_3').keyup(function(){ validationDeportivos(); });

     function validationDeportivos(){

     	var juegos_1 = Math.abs($("#juegos_1").val());
     	var juegos_2 = Math.abs($("#juegos_2").val());
     	var juegos_3 = Math.abs($("#juegos_3").val());

     	var total=$("#amount_stage_games").val()-juegos_1-juegos_2-juegos_3;
     	$("#valueEscolares").html("$ "+total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

     }




 </script>
 <script type="text/javascript">



 	$('#wizard_verticle').smartWizard({
				  // Properties
					selected: 0,  // Selected Step, 0 = first step   
					keyNavigation: false, // Enable/Disable key navigation(left and right keys are used if enabled)
					enableAllSteps: false,  // Enable/Disable all steps on first load
					transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
					contentURL:null, // specifying content url enables ajax content loading
					contentURLData:null, // override ajax query parameters
					contentCache:true, // cache step contents, if false content is fetched always from ajax url
					cycleSteps: false, // cycle step navigation
					enableFinishButton: false, // makes finish button enabled always
					hideButtonsOnDisabled: false, // when the previous/next/finish buttons are disabled, hide them instead
					errorSteps:[],    // array of step numbers to highlighting as error steps
					labelNext:'Siguiente', // label for Next button
					labelPrevious:'Anterior', // label for Previous button
					labelFinish:'Crear',  // label for Finish button        
					noForwardJumping:false,
					ajaxType: 'POST',
				  // Events
					onLeaveStep: leaveAStepCallback2, // triggers when leaving a step
					onShowStep: null,  // triggers when showing a step
					onFinish: onFinishCallback2,  // triggers when Finish button is clicked  
					buttonOrder: ['finish','next','prev']  // button order, to hide a button remove it from the list
				}); 

 	$('.buttonNext').addClass('btn btn-success');
 	$('.buttonPrevious').addClass('btn btn-primary');
 	$('.buttonFinish').addClass('btn btn-default');				

 	function leaveAStepCallback2(obj, context){
					return validateSteps2(context.fromStep,context.toStep); // return false to stay on step and true to continue navigation 
				}

				function onFinishCallback2(objs, context){
					if(validateAllSteps2()){			    		
						$('form').submit();
					}
				}

				// Your Step validation logic
				function validateSteps2(stepnumber,tonumber){
					var isStepValid = true;
					// validar paso 1
					if(stepnumber == 1){

						
						var year= $("#year").val();
						var amount_total= $("#amount_total").val();
						var numbers_employees= $("#numbers_employees").val();
						var state= $("#state").val();

						if(year!="" && amount_total!="" && numbers_employees!="" && state!="" ){	
							$("#amount_total_title").html("Monto Disponible $"+amount_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#employes_total_title").html("Empleados Disponibles: "+numbers_employees.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
								//valida datos  en input
								validationCompetition();
								validationEmployee();

								return true;
							}
							else{

								new PNotify({
									title: 'Error!',
									text: 'Complete todos los campos.',
									type: 'error',
									styling: 'bootstrap3'
								});
							}	
						}
					 // validar paso 2
					 if(stepnumber == 2){	

					 	//si vuelve atras
					 	if(tonumber==1){
					 		return true;
					 	}
					 	var employees_school_competition = $("#employees_school_competition").val();
					 	var amount_school_competition = $("#amount_school_competition").val();
					 	var employees_federated_competition = $("#employees_federated_competition").val();
					 	var amount_federated_competition= $("#amount_federated_competition").val();
					 	var employees_school_sup_competitiont= $("#employees_school_sup_competition").val();
					 	var amount_school_sup_competition= $("#amount_school_sup_competition").val();


						//todos los datos ingresados
						if(employees_school_competition!="" && amount_school_competition !="" && employees_federated_competition!="" && amount_federated_competition!="" && employees_school_sup_competitiont !="" && amount_school_sup_competition!="" ){

							var value_amount= $("#amount_total_title").text().replace( /^\D+/g, '');
							var value_employee= $("#employes_total_title").text().replace( /^\D+/g, '');							

							if(value_amount==0 && value_employee==0){
							//agregamos datos a la etapa 3
							$("#amount_school_value").html("$ "+amount_school_competition.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#amount_federated_value").html("$ "+amount_federated_competition.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#amount_school_sup_value").html("$ "+amount_school_sup_competition.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

							//valida datos  en input	
							validationEscolar();
							validationFederada();
							validationGames();

							return true;
						}
						else{
							new PNotify({
								title: 'Error!',
								text: 'Revise los valores ingresados.',
								type: 'error',
								styling: 'bootstrap3'
							});

						}

					}  
					else{		         		

						new PNotify({
							title: 'Error!',
							text: 'Complete todos los campos.',
							type: 'error',
							styling: 'bootstrap3'
						});
					}	 
				}
					 // validar paso 3
					 if(stepnumber == 3){	   

					 	//si vuelve atras
					 	if(tonumber==2){
					 		return true;
					 	}
					 	
					 	var amount_stage_communal= $("#amount_stage_communal").val();
					 	var amount_stage_provincial = $("#amount_stage_provincial").val();	
					 	var amount_stage_regional = $("#amount_stage_regional").val();
					 	var amount_stage_national = $("#amount_stage_national").val();			         	
					 	var amount_stage_games = $("#amount_stage_games").val();
					 	
					 	var amount_stage_preparation = $("#amount_stage_preparation").val();
					 	var amount_stage_participation = $("#amount_stage_participation").val();

					 	var amount_stage_regional_sup= $("#amount_stage_regional_sup").val();
					 	var amount_stage_ldes= $("#amount_stage_ldes").val();


					 	if(amount_stage_communal!="" && amount_stage_provincial!="" && amount_stage_regional!="" && amount_stage_national!="" && amount_stage_games!="" && amount_stage_preparation!="" && amount_stage_participation!="" && amount_stage_regional_sup!="" && amount_stage_ldes!="" ){

					 		//todos los datos en 0
					 		var amount_school_value= $("#amount_school_value").text().replace( /^\D+/g, '');
					 		var amount_federated_value= $("#amount_federated_value").text().replace( /^\D+/g, '');	
					 		var amount_school_sup_value= $("#amount_school_sup_value").text().replace( /^\D+/g, '');							

					 		if(amount_school_value==0 && amount_federated_value==0 && amount_school_sup_value==0){
							//agregamos datos a la etapa 4
							$("#valueComunal").html("$ "+amount_stage_communal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#valueProvincial").html("$ "+amount_stage_provincial.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#valueRegional").html("$ "+amount_stage_regional.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#valueNacional").html("$ "+amount_stage_national.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
							$("#valueEscolares").html("$ "+amount_stage_games.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

							validationComunal();
							validationProvincial();
							validationRegional();
							validationNacional();
							validationDeportivos();
							return true;
						}
						else{
							new PNotify({
								title: 'Error!',
								text: 'Revise los valores ingresados.',
								type: 'error',
								styling: 'bootstrap3'
							});

						}


					}
					else{
						new PNotify({
							title: 'Error!',
							text: 'Complete todos los campos.',
							type: 'error',
							styling: 'bootstrap3'
						});
					}	     

				}
					 //paso final
					 if(stepnumber == 4){

					 	//si vuelve atras
					 	if(tonumber==3){
					 		return true;
					 	}

					 	
					 }

					// ...      
				}
				function validateAllSteps2(){
					    
					var comunal_1 = $("#comunal_1").val();
			     	var comunal_2 = $("#comunal_2").val();
			     	var comunal_3 = $("#comunal_3").val();
			     	var comunal_4 = $("#comunal_4").val();
			     	var comunal_5 = $("#comunal_5").val();
			     	var comunal_6 = $("#comunal_6").val();
			     	var comunal_7 = $("#comunal_7").val();
			     	var comunal_8 = $("#comunal_8").val();
			     	var comunal_9 = $("#comunal_9").val();
			     	var comunal_10 = $("#comunal_10").val();
			     	var comunal_11 = $("#comunal_11").val();
			     	var comunal_12 = $("#comunal_12").val();
			     	var comunal_13 = $("#comunal_13").val();
			     	var comunal_14 = $("#comunal_14").val();
			     	var comunal_15 = $("#comunal_15").val();
			     	var comunal_16 = $("#comunal_16").val();
			     	var comunal_17 = $("#comunal_17").val();
			     	var comunal_18 = $("#comunal_18").val();
			     	var comunal_19 = $("#comunal_19").val();
			     	var comunal_20 = $("#comunal_20").val();
			     	var comunal_21 = $("#comunal_21").val();
			     	var comunal_22 = $("#comunal_22").val();
			     	var comunal_23 = $("#comunal_23").val();
			     	var comunal_24 = $("#comunal_24").val();
			     	var comunal_25 = $("#comunal_25").val();
			     	var comunal_26 = $("#comunal_26").val();
			     	var comunal_27 = $("#comunal_27").val();
			     	var comunal_28 = $("#comunal_28").val();
			     	var comunal_29 = $("#comunal_29").val();
			     	var comunal_30 = $("#comunal_30").val();
			     	var comunal_31 = $("#comunal_31").val();
			     	var comunal_32 = $("#comunal_32").val();
			     	var comunal_33 = $("#comunal_33").val();
			     	var comunal_34 = $("#comunal_34").val();
			     	var comunal_35 = $("#comunal_35").val();
			     	var comunal_36 = $("#comunal_36").val();
			     	var comunal_37 = $("#comunal_37").val();
			     	var comunal_38 = $("#comunal_38").val();
			     	var comunal_39 = $("#comunal_39").val();
			     	var comunal_40 = $("#comunal_40").val();
			     	var comunal_41 = $("#comunal_41").val();
			     	var comunal_42 = $("#comunal_42").val();
			     	var comunal_43 = $("#comunal_43").val();
			     	var comunal_44 = $("#comunal_44").val();
			     	var comunal_45 = $("#comunal_45").val();
			     	var comunal_46 = $("#comunal_46").val();
			     	var comunal_47 = $("#comunal_47").val();
			     	var comunal_48 = $("#comunal_48").val();
			     	var comunal_49 = $("#comunal_49").val();
			     	var comunal_50 = $("#comunal_50").val();
			     	var comunal_51 = $("#comunal_51").val();
			     	var comunal_52 = $("#comunal_52").val();

			     	var provincial_1 = $("#provincial_1").val();
			     	var provincial_2 = $("#provincial_2").val();
			     	var provincial_3 = $("#provincial_3").val();
			     	var provincial_4 = $("#provincial_4").val();
			     	var provincial_5 = $("#provincial_5").val();
			     	var provincial_6 = $("#provincial_6").val();
			     	var provincial_7 = $("#provincial_7").val();

			     	var regional_1 = $("#regional_1").val();
			     	var regional_2 = $("#regional_2").val();
			     	var regional_3 = $("#regional_3").val();
			     	var regional_4 = $("#regional_4").val();
			     	var regional_5 = $("#regional_5").val();
			     	var regional_6 = $("#regional_6").val();
			     	var regional_7 = $("#regional_7").val();
			     	var regional_8 = $("#regional_8").val();
			     	var regional_9 = $("#regional_9").val();
			     	var regional_10 = $("#regional_10").val();
			     	var regional_11 = $("#regional_11").val();
			     	var regional_12 = $("#regional_12").val();

			     	var nacional_1 = $("#nacional_1").val();
			     	var nacional_2 = $("#nacional_2").val();
			     	var nacional_3 = $("#nacional_3").val();
			     	var nacional_4 = $("#nacional_4").val();
			     	var nacional_5 = $("#nacional_5").val();
			     	var nacional_6 = $("#nacional_6").val();
			     	var nacional_7 = $("#nacional_7").val();
			     	var nacional_8 = $("#nacional_8").val();
			     	var nacional_9 = $("#nacional_9").val();
			     	var nacional_10 = $("#nacional_10").val();
			     	var nacional_11 = $("#nacional_11").val();
			     	var nacional_12 = $("#nacional_12").val();

			     	var juegos_1 = Math.abs($("#juegos_1").val());
			     	var juegos_2 = Math.abs($("#juegos_2").val());
			     	var juegos_3 = Math.abs($("#juegos_3").val());

			     	if(comunal_1!="" && comunal_2 !="" && comunal_3 !="" && comunal_4 !="" && comunal_5 !="" && comunal_6 !="" && comunal_7 !="" && comunal_8 !="" && comunal_9 !="" && comunal_10 !="" && comunal_11 !="" && comunal_12 !="" && comunal_13 !="" && comunal_14 !="" && comunal_15 !="" && comunal_16 !="" && comunal_17 !="" && comunal_18 !="" && comunal_19 !="" && comunal_20 !="" && comunal_21 !="" && comunal_22 !="" && comunal_23 !="" && comunal_24 !="" && comunal_25 !="" && comunal_26 !="" && comunal_27 !="" && comunal_28 !="" && comunal_29 !="" && comunal_30 !="" && comunal_31 !="" && comunal_32 !="" && comunal_33 !="" && comunal_34 !="" && comunal_35 !="" && comunal_36 !="" && comunal_37 !="" && comunal_38 !="" && comunal_39 !="" && comunal_40 !="" && comunal_41 !="" && comunal_42 !="" && comunal_43 !="" && comunal_44 !="" && comunal_45 !="" && comunal_46 !="" && comunal_47 !="" && comunal_48 !="" && comunal_49 !="" && comunal_50 !="" && comunal_51 !="" && comunal_52 !="" && provincial_1 !="" && provincial_2 !="" && provincial_3 !="" && provincial_4 !="" && provincial_5 !="" && provincial_6 !="" && provincial_7 !="" && regional_1 !="" && regional_2 !="" && regional_3 !="" && regional_4 !="" && regional_5 !="" && regional_6 !="" && regional_7 !="" && regional_8 !="" && regional_9 !="" && regional_10 !="" && regional_11 !="" && regional_12 !="" && nacional_1 !="" && nacional_2 !="" && nacional_3 !="" && nacional_4 !="" && nacional_5 !="" && nacional_6 !="" && nacional_7 !="" && nacional_8 !="" && nacional_9 !="" && nacional_10 !="" && nacional_11 !="" && nacional_12 !="" && juegos_1 !="" && juegos_2 !="" && juegos_3)
			     	{
			     		//todos los datos en 0
					 		var valueComunal= $("#valueComunal").text().replace( /^\D+/g, '');
					 		var valueProvincial= $("#valueProvincial").text().replace( /^\D+/g, '');	
					 		var valueRegional = $("#valueRegional").text().replace( /^\D+/g, '');
					 		var valueNacional= $("#valueNacional").text().replace( /^\D+/g, '');
					 		var valueEscolares= $("#valueEscolares").text().replace( /^\D+/g, '');							

					 		if(valueComunal==0 && valueProvincial==0 && valueRegional==0 && valueNacional==0 && valueEscolares==0){

					 			return true;
					 		}
							else{
								new PNotify({
								title: 'Error!',
								text: 'Revise los valores ingresados.',
								type: 'error',
								styling: 'bootstrap3'
							});
							}
			     		
			     	}
			     	else{

			     		new PNotify({
							title: 'Error!',
							text: 'Complete todos los campos.',
							type: 'error',
							styling: 'bootstrap3'
						});
			     	}
					
				}



			</script>
			@endsection