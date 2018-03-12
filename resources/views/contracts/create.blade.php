 @extends('layouts.home')
 @section('styles')
 <link href="{{ asset('/assets/app/css/pnotify.css')}}" rel="stylesheet"> 
 @endsection
 @section('content') 
 <!-- page content -->
 <div class="right_col" role="main">
 	<div class="">
 		<div class="clearfix"></div>
 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="x_panel">
 					<div class="x_title">
 						<h2>Crear Contrato </h2>
 						<div class="clearfix"></div>
 					</div>
 					<div class="x_content">
 						@include('flash::message') 
 						<form class="form-horizontal form-label-left" role="form" method="POST"  action="{{ url('/contratos/crear') }}">
 							{!! csrf_field() !!}  
 							<!-- Smart Wizard -->
 							<p>Debe seguir los siguientes pasos para crear un nuevo contrato.</p>
 							<div id="wizard" class="form_wizard wizard_horizontal">
 								<ul class="wizard_steps">
 									<li>
 										<a href="#step-1">
 											<span class="step_no">1</span>
 											<span class="step_descr">
 												Paso 1<br />
 												<small>Seleccionar empleado</small>
 											</span>
 										</a>
 									</li>
 									<li>
 										<a href="#step-2">
 											<span class="step_no">2</span>
 											<span class="step_descr">
 												Paso 2<br />
 												<small>Datos contratación</small>
 											</span>
 										</a>
 									</li>
 									<li>
 										<a href="#step-3">
 											<span class="step_no">3</span>
 											<span class="step_descr">
 												Paso 3<br />
 												<small>Datos presupuesto</small>
 											</span>
 										</a>
 									</li>
 									<li>
 										<a href="#step-4">
 											<span class="step_no">4</span>
 											<span class="step_descr">
 												Paso 4<br />
 												<small>Resumen Final</small>
 											</span>
 										</a>
 									</li>
 								</ul>
 								<div id="step-1">
 									<div class="ln_solid"></div>
 									<div class="form-group">
 										<div class="row">
 											<div class="col-md-6 col-md-offset-3">
 												<div class="col-md-6 col-sm-6 col-xs-12   ">  
 													<div class="input-group">
 														<input id="rut_employee" type="text" placeholder="Ingrese Rut" maxlength="12" value="{{ old('rut_employee') }}"  class="form-control @if($errors->has('rut_employee')) parsley-error @endif " name="rut_employee" >  
 														<span class="input-group-btn">
 															<button type="button" id="button_rut" class="btn btn-primary">Buscar</button>
 														</span>
 													</div>
 													@if($errors->has('rut_employee'))
 													<ul class="parsley-errors-list filled">
 														@foreach($errors->get('rut_employee') as $error)
 														<li class="parsley-required">{{ $error }}</li>
 														@endforeach
 													</ul>                  
 													@endif
 													<ul id="errorRut" class="parsley-errors-list hidden">                    
 														<li class="parsley-required">Rut Incorrecto</li>                    
 													</ul>
 												</div>
 												<div class="col-md-2 col-sm-6 col-xs-12   ">                                          
 													<a class="btn btn-primary" href="{{ url('/empleados/crear') }}"> Crear empleado</a>                  
 												</div>
 											</div>
 										</div>
 										<br>                    

 										<div class="row">
 											<div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3 profile_details" id="div_employee">  
 												<br>
 												<br>
 												<br>                  
 												<h4>Realice la busqueda de un empelado o cree uno.</h4>
 												<br>
 												<br>
 												<br>
 												<br>
 												<br>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div id="step-2">
 									<div class="ln_solid"></div>  

 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="position" >
 											Cargo
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="position" value="{{ old('position') }}" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('position')) parsley-error @endif"
 											name="position"  required>
 											@if($errors->has('position'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('position') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 										</div>
 									</div>  
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="function">Funcion <span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='function' name="function" required="">
 												<option value="">-- Por favor seleccione --</option>                  
 												<option {{(old('function')=='Control de Competencia')?'selected' : ''}}  value="Control de Competencia">Control de Competencia</option> 
 												<option {{(old('function')=='Monitor')?'selected' : ''}} value="Monitor">Monitor</option>                
 												<option {{(old('function')=='Gestor Territorial')?'selected' : ''}}  value="Gestor Territorial">Gestor Territorial</option> 
 												<option {{(old('function')=='Administrador Contable')?'selected' : ''}} value="Administrador Contable">Administrador Contable</option>
 												<option {{(old('function')=='Coordimador')?'selected' : ''}} value="Coordimador">Coordimador</option>
 												<option {{(old('function')=='Encargado')?'selected' : ''}}  value="Encargado">Encargado</option> 
 												<option {{(old('function')=='Apoyo al Programa')?'selected' : ''}} value="Apoyo al Programa">Apoyo al Programa</option>
 												<option {{(old('function')=='Técnico')?'selected' : ''}} value="Técnico">Técnico</option>
 												<option {{(old('function')=='Ayudante Técnico')?'selected' : ''}}  value="Ayudante Técnico">Ayudante Técnico</option>   
 												<option {{(old('function')=='Delegado')?'selected' : ''}}  value="Delegado">Delegado</option>  
 												<option {{(old('function')=='Mecánico')?'selected' : ''}}  value="Mecánico">Mecánico</option> 
 											</select>                      
 										</div>
 									</div>
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sport" >
 											Deporte
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="sport" value="{{ old('sport') }}" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('sport')) parsley-error @endif"
 											name="sport"  required>
 											@if($errors->has('sport'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('sport') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 										</div>
 									</div>                 
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration">Continuidad <span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='duration' name="duration" required="">
 												<option value="">-- Por favor seleccione --</option>  
 												<option {{(old('duration')=='Transitorio')?'selected' : ''}}  value="Transitorio">Transitorio</option>  
 												<option {{(old('duration')=='Permanente')?'selected' : ''}}  value="Permanente">Permanente</option> 
 											</select>                      
 										</div>
 									</div>

 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_year" >
 											Monto Anual
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="amount_year" value="{{ old('amount_year') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_year')) parsley-error @endif"
 											name="amount_year"  required>
 											@if($errors->has('amount_year'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('amount_year') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 											<ul id="errorAmount" class="parsley-errors-list hidden">                    
 												<li class="parsley-required">Monto sobrepasa el presupuesto total.</li>
 											</ul>
 										</div>
 									</div> 
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount_month" >
 											Monto Mensual
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="amount_month" value="{{ old('amount_month') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('amount_month')) parsley-error @endif"
 											name="amount_month"  required>
 											@if($errors->has('amount_month'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('amount_month') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 										</div>
 									</div> 
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="quotas" >
 											Nº Cuotas
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="quotas" value="{{ old('quotas') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('quotas')) parsley-error @endif"
 											name="quotas"  required>
 											@if($errors->has('quotas'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('quotas') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 										</div>
 									</div> 
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hours" >
 											Horas Mensuales
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="hours" value="{{ old('hours') }}" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('hours')) parsley-error @endif"
 											name="hours"  required>
 											@if($errors->has('hours'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('hours') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 										</div>
 									</div> 
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_start" >
 											Fecha de Inicio
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="date_start" type="text" value="{{ old('date_start') }}" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 @if($errors->has('date_start')) parsley-error @endif"
 											name="date_start"  required>
 											@if($errors->has('date_start'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('date_start') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 											<ul id="errorStart" class="parsley-errors-list hidden">                    
 												<li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
 											</ul>
 										</div>
 									</div>
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_finish" >
 											Fecha de Termino
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="date_finish" type="text" value="{{ old('date_finish') }}" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 @if($errors->has('date_finish')) parsley-error @endif"
 											name="date_finish"  required>
 											@if($errors->has('date_finish'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('date_finish') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 											<ul id="errorFinish" class="parsley-errors-list hidden">                    
 												<li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
 											</ul>
 											<ul id="errorFinishStart" class="parsley-errors-list hidden">                    
 												<li class="parsley-required">Fecha de Termino tiene que ser despúes de Fecha de Inicio.</li>                    
 											</ul>
 										</div>
 									</div>
 								</div>
 								<div id="step-3">
 									<div class="ln_solid"></div>

 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="program" >
 											Programa
 											<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">
 											<input id="program" value="{{ old('program') }}" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('program')) parsley-error @endif"
 											name="program"  required>
 											@if($errors->has('program'))
 											<ul class="parsley-errors-list filled">
 												@foreach($errors->get('program') as $error)
 												<li class="parsley-required">{{ $error }}</li>
 												@endforeach
 											</ul>
 											@endif
 										</div>
 									</div>  
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="responsable">Responsable <span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='responsable' name="responsable" required="">
 												<option value="">-- Por favor seleccione --</option>                  
 												@foreach($responsables as $responsable)
 												<option  {{(old('responsable')==$responsable->id )?'selected' : ''}} value="{{ $responsable->id }}">{{ $responsable->names.' '.$responsable->last_name }}</option>
 												@endforeach
 											</select>                      
 										</div>
 									</div>  
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="component">Competencia <span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='component' name="component" required="">
 												<option value="">-- Por favor seleccione --</option>                  
 												@foreach($components as $component)
 												<option  {{(old('component')==$component->id )?'selected' : ''}} value="{{ $component->id }}">{{ $component->name }}</option>
 												@endforeach
 											</select>                      
 										</div>
 									</div>
 									<div class="item form-group">
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_stages">Tipo de Etapa <span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='type_stages' name="type_stages" disabled required="">
 												<option value="">-- Por favor seleccione --</option>  
 											</select>                      
 										</div>
 									</div>
 									<div id="stage_div" class="item form-group " hidden >
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stage">Etapa<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='stage' name="stage" disabled required="">
 												<option value="">-- Por favor seleccione --</option> 
 											</select>                      
 										</div>
 									</div> 
 									<div id="category_div" class="item form-group " hidden>
 										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Categoria<span class="required">*</span>
 										</label>
 										<div class="col-md-6 col-sm-6 col-xs-12">  
 											<select class='form-control' id='category' name="category"  required="">
 												<option value="">-- Por favor seleccione --</option> 
 												<option {{(old('category')=='Sub14')?'selected' : ''}}  value="Sub14">Sub14</option>  
 												<option {{(old('category')=='Segunda Categoria')?'selected' : ''}}  value="Segunda Categoria">Segunda Categoria</option> 
 											</select>                      
 										</div>
 									</div> 
 									<br>
 									<br>                             
 								</div>
 								<div id="step-4">
 									<div class="row">
 										<div class="col-md-12">
 											<div class="x_panel">
 												<div class="x_content">
 													<section class="content invoice">
 														<!-- title row -->
 														<div class="x_title">
 															<h3>
 																<i class="fa fa-id-card-o" aria-hidden="true"></i> Resumen Contrato
 																<small class="pull-right">Estado: Firma Contrato </small>                                    
 															</h3>
 															<div class="clearfix"></div>
 														</div>
 														<!-- info row -->
 														<div class="row invoice-info">
 															<div id="contract_datos1" class="col-sm-4 invoice-col">
 																
 															</div>
 															<!-- /.col -->
 															<div id="contract_datos2" class="col-sm-4 invoice-col">
 																
 															</div>
 															<!-- /.col -->
 															<div id="contract_datos3" class="col-sm-4 invoice-col"> 																
 															</div> 														
 														</div>
 														<!-- /.row -->
 														<!-- info row -->
 														<div class="row invoice-info">
 															<div id="contract_datos4" class="col-sm-4 invoice-col">
 																
 															</div>
 															<!-- /.col -->
 															<div id="contract_datos5" class="col-sm-4 invoice-col">
 																
 															</div>
 															<!-- /.col -->
 															<div id="contract_datos6" class="col-sm-4 invoice-col">
 																
 															</div>
 															<!-- /.col -->

 														</div>
 														<!-- /.row -->	
 														<!-- /.row -->                  
 													</section>
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
 <!-- /page content -->
 @endsection
 @section('scripts')
 <script src="{{ asset('/assets/app/js/jquery.smartWizard.js')}}"></script>
 <script src="{{ asset('/assets/app/js/pnotify.js')}}"></script>
 <script src="{{asset('/assets/app/js/jquery.inputmask.bundle.js')}}"></script>
 <script src="{{asset('/assets/app/js/moment.js')}}"></script>


 <script type="text/javascript">
 	$('#amount_year').focusout(function(){
 	var amount_year = $( "#amount_year" ).val(); 
  //validamos si no esta en la opcion inicial
      
      	$.ajax({
      		type : 'get',
      		url : '{{URL::to('contratos/buscar/presupuesto')}}',
      		data:{'amount_year':amount_year},
      		success:function(data){ 
      			if(data=="false"){
      				$('#errorAmount').removeClass('hidden');
      				$('#amount_year').addClass('parsley-error');
      				 
      			}
      			else{

      				$('#errorAmount').addClass('hidden');
      				$('#amount_year').removeClass('parsley-error'); 
      			}
      			
      		}
      	});  

 	});
  //ajax search rut empleado
  $("#button_rut").click(function(){

  	$value=$("#rut_employee").val();
  	$.ajax({
  		type : 'get',
  		url : '{{URL::to('empleados/buscar/empleado')}}',
  		data:{'rut':$value},
  		success:function(data){               
  			$('#div_employee').html(data);
  		}
  	});   
  });

  $("select[name='component']").change(function(){

  	var idComponent = $( "#component" ).val(); 
      //validamos si no esta en la opcion inicial
      if(idComponent!=""){ 
      	if(idComponent==1){
      		$("#category_div").show();
      		$("#stage_div").show();        
      	}
      	else{
      		$('#category_div').hide();
      		$('#stage_div').hide();
      		$("#type_stages").prop("disabled", true);
      		$("#type_stages").val("").change();
      		$("#stage").prop("disabled", true);
      		$("#stage").val("").change();
      		$("#category").val("").change();
      	}
      	$.ajax({
      		type : 'get',
      		url : '{{URL::to('contratos/buscar/competencia')}}',
      		data:{'id_component':idComponent},
      		success:function(data){ 
      			$("#type_stages").html(data);
      			$("#type_stages").prop("disabled", false);
      		}
      	});   
      }
      else{
      //voler al inicio
      $('#category_div').hide();
      $('#stage_div').hide();
      $("#type_stages").prop("disabled", true);
      $("#type_stages").val("").change();
      $("#stage").prop("disabled", true);
      $("#stage").val("").change();
      $("#category").val("").change();
  }
});

  $("select[name='type_stages']").change(function(){

  	var id_type_stages = $( "#type_stages" ).val(); 
  	var id_component = $( "#component" ).val(); 
      //validamos si no esta en la opcion inicial
      
      if(id_type_stages!="" && id_component==1){ 

      	$.ajax({
      		type : 'get',
      		url : '{{URL::to('contratos/buscar/tipos')}}',
      		data:{'id_type_stages':id_type_stages},
      		success:function(data){ 
      			$("#stage").html(data);
      			$("#stage").prop("disabled", false);
      		}
      	});   
      }else{
      	$("#stage").prop("disabled", true);
      	$("#stage").val("").change();
      }
  });

</script>

<script type="text/javascript">
    //valida rut
    $(document).ready(function(){

    	$('#rut_employee').focusout(function(){
    		var rut = $('#rut_employee').val();
    		if( rut != "" ){
      //Agrega guion, si no lo tiene
      //Elimina los puntos, si los tiene
      var np = parseRut(rut);
      if( Fn.validaRut(np)){
      	$('#errorRut').addClass('hidden');
      	$('#rut_employee').removeClass('parsley-error');  
      	$(':input[type="submit"]').prop('disabled', false); 
      }
      else{
      	$('#errorRut').removeClass('hidden');
      	$('#rut_employee').addClass('parsley-error');
      	$(':input[type="submit"]').prop('disabled', true);           
      }
      rut = addDots(np);
      $('#rut_employee').val( rut );
  }
  else{            
  	$('#rut_employee').removeClass('parsley-error');
  	$('#errorRut').addClass('hidden');  
  	$(':input[type="submit"]').prop('disabled', false);      
  }
});
    });

    function addDots( rut ){
    	var res = "";
    	for( i = rut.length ; i >= 0 ; i-- ){
    		res = rut.charAt(i) + res;
    		if( i == rut.length-5 || i == rut.length-8 ){
    			res = "." + res;
    		}
    	}
    	return res;
    }

    function parseRut( rut ){
    	var res = "";
    	for( var i = 0 ; i < rut.length ; i++){
    		if( rut.charAt(i) != '.' ){
    			res += rut.charAt(i);
    		}
    		if( i == rut.length-2 ){
    			if( rut.charAt(i) != '-' ){
    				res += '-';       
    			}
    		}
    	}
    	rut = res;
    	if( rut.length > 10 ){
    		res = "";
    		for( i = rut.length ; i >= rut.length-10 ; i-- ){
    			res = rut.charAt(i) + res;
    		}
    	}
    	return res;
    }
</script>
<script type="text/javascript">
	var Fn = {
  // Valida el rut con su cadena completa "XXXXXXXX-X"
  validaRut : function (rutCompleto) {
  	if (!/^[0-9]+-[0-9kK]{1}$/.test( rutCompleto ))
  		return false;
  	var tmp     = rutCompleto.split('-');
  	var digv    = tmp[1]; 
  	var rut     = tmp[0];
  	if ( digv == 'K' ) digv = 'k' ;
  	return (Fn.dv(rut) == digv );
  },
  dv : function(T){
  	var M=0,S=1;
  	for(;T;T=Math.floor(T/10))
  		S=(S+T%10*(9-M++%6))%11;
  	return S?S-1:'k';
  }
}
</script>

<script type="text/javascript">
  //validacion fecha 
  $(document).ready(function(){
  	$('#date_start').focusout(function(){
  		var date_start = $('#date_start').val();
  		if( date_start != "" ){     

  			if( moment(date_start , 'DD/MM/YYYY',true).isValid()){
  				$('#errorStart').addClass('hidden');
  				$('#date_start').removeClass('parsley-error');           
  			}
  			else{
  				$('#errorStart').removeClass('hidden');
  				$('#date_start').addClass('parsley-error');          
  			}       
  			$('#date_start').val( date_start );
  		}
  		else{            
  			$('#date_start').removeClass('parsley-error');
  			$('#errorStart').addClass('hidden');         
  		}
  	});

  	$('#date_finish').focusout(function(){
  		var date_finish = $('#date_finish').val();
  		var date_start = $('#date_start').val();
  		if( date_finish != "" ){     
        //valida si es correcta la fecha
        if( moment(date_finish, 'DD/MM/YYYY',true).isValid()){
        	$('#errorFinish').addClass('hidden');
        	$('#date_finish').removeClass('parsley-error'); 

          //validacion fecha termino despues de fecha inicio
          var start = moment(date_start,"DD-MM-YYYY");
          var finish = moment(date_finish,"DD-MM-YYYY");         

          if(finish.diff(start,'days')<1){
          	$('#errorFinishStart').removeClass('hidden');
          	$('#date_finish').addClass('parsley-error'); 
          }
          else{
          	$('#errorFinishStart').addClass('hidden');
          	$('#date_finish').removeClass('parsley-error'); 
          }

      }
      else{
      	$('#errorFinish').removeClass('hidden');
      	$('#date_finish').addClass('parsley-error');          
      }       
      $('#date_finish').val( date_finish);
  }
  else{            
  	$('#date_finish').removeClass('parsley-error');
  	$('#errorFinish').addClass('hidden');         
  }
});
  });
</script>

@endsection