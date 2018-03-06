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
						<h2>Crear Empleado </h2>                  
						<div class="clearfix"></div>
					</div>
					<div class="x_content">               
						@include('flash::message') 
						<form class="form-horizontal form-label-left" role="form" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="{{ url('/empleados/crear') }}">
							{!! csrf_field() !!}             
							<h4 class="section">Completar Información</h4>

							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="names" >
									Nombres
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="names" value="{{ old('names') }}" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('names')) parsley-error @endif"
									name="names"  required>
									@if($errors->has('names'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('names') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>  
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
									Apellido Paterno 
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="last_name" type="text" value="{{ old('last_name') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('last_name')) parsley-error @endif"
									name="last_name"  required>
									@if($errors->has('last_name'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('last_name') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>    
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name_mother" >
									Apellido Materno
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="last_name_mother" type="text" value="{{ old('last_name_mother') }}"class="form-control col-md-7 col-xs-12 @if($errors->has('last_name_mother')) parsley-error @endif"
									name="last_name_mother"  required>
									@if($errors->has('last_name_mother'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('last_name_mother') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div> 
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut" >
									RUT
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="rut" type="text"  maxlength="12" value="{{ old('rut') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('rut')) parsley-error @endif" name="rut"  required>
									@if($errors->has('rut'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('rut') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>                  
									@endif
									<ul id="errorRut" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Rut Incorrecto</li>                    
									</ul>
								</div>
							</div>          
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
									Email
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="email" type="email"  value="{{ old('email') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('email')) parsley-error @endif"
									name="email"  required>
									@if($errors->has('email'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('email') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut" >
									Teléfono
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="phone" type="text" value="{{ old('phone') }}" data-inputmask="'mask' : '(9)-99999999', 'placeholder': '(x)-xxxxxxxx'" class="form-control col-md-7 col-xs-12 @if($errors->has('phone')) parsley-error @endif"
									name="phone"  required>
									@if($errors->has('phone'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('phone') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div> 
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut" >
									Dirección
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="address" type="text" value="{{ old('address') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('address')) parsley-error @endif"
									name="address"  required>
									@if($errors->has('address'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('address') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div> 
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="commune" >
									Comuna
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="commune" type="text" value="{{ old('commune') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('commune')) parsley-error @endif"
									name="commune"  required>
									@if($errors->has('commune'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('commune') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div> 
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut" >
									Fecha de Nacimiento
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="birth_date" type="text" value="{{ old('birth_date') }}" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 @if($errors->has('birth_date')) parsley-error @endif"
									name="birth_date"  required>
									@if($errors->has('birth_date'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('birth_date') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
									<ul id="errorBirth" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
									</ul>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="afp">AFP<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">  
									<select class='form-control' id='afp' name="afp" required="">
										<option value="">-- Por favor seleccione --</option>									
										@foreach($afps as $afp)
										<option {{(old('afp')==$afp->id )?'selected' : ''}} value="{{ $afp->id }}">{{ $afp->name }}</option>
										@endforeach
									</select>                      
								</div>
							</div>	
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="health">Salud<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">  
									<select class='form-control' id='health' name="health" required="">
										<option value="">-- Por favor seleccione --</option>									
										@foreach($healths as $health)
										<option  {{(old('health')==$health->id )?'selected' : ''}} value="{{ $health->id }}">{{ $health->name }}</option>
										@endforeach
									</select>                      
								</div>
							</div>   
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="profession" >
									Profesión
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="profession" type="text" value="{{ old('profession') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('profession')) parsley-error @endif"
									name="profession"  required>
									@if($errors->has('profession'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('profession') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Calidad de Estudios <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">  
									<select class='form-control' id='quality_studies' name="quality_studies" required="">
										<option value="">-- Por favor seleccione --</option>									
										<option {{(old('quality_studies')=='Técnico')?'selected' : ''}}  value="Técnico">Técnico</option>	
										<option {{(old('quality_studies')=='Profesional')?'selected' : ''}} value="Profesional">Profesional</option>
										<option {{(old('quality_studies')=='Experto')?'selected' : ''}} value="Experto">Experto</option>
									</select>                      
								</div>
							</div>
							<div class="item form-group" id='semesters_div' hidden>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="semesters" >
									Semestres
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="semesters" type="number" value="{{ old('semesters') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('semesters')) parsley-error @endif"
									name="semesters" >
									@if($errors->has('semesters'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('semesters') as $error)
										<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="semestres">Adjuntar cedula de identidad<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="btn-group">                                    
										<input type="file" id='file_certificado'  data-role="magic-overlay" value="{{ old('file_cedula') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('file_cedula')) parsley-error @endif" name="file_cedula" data-target="#pictureBtn" data-edit="insertImage"  required>										
									</div>
									@if($errors->has('file_cedula'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('file_cedula') as $error)
											<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
										@endif
										<ul id="error_certificado" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Tamaño del Archivo mayor a 5MB.</li>                    
									</ul>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="semestres">Adjuntar certificado<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="btn-group">
										<input id='file_cedula' type="file" data-role="magic-overlay" value="{{ old('file_certificado') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('file_certificado')) parsley-error @endif" name="file_certificado" data-target="#pictureBtn" data-edit="insertImage"  required>									
									</div>
									@if($errors->has('file_certificado'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('file_certificado') as $error)
											<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
										@endif
										<ul id="error_cedula" class="parsley-errors-list hidden">                    
										<li class="parsley-required">Tamaño del Archivo mayor a 5MB.</li>                    
									</ul>
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
	<!-- /page content -->
	@endsection
	@section('scripts')
	<script src="{{asset('/assets/app/js/jquery.inputmask.bundle.js')}}"></script>
	<script src="{{asset('/assets/app/js/moment.js')}}"></script>
	<script type="text/javascript">
		//valida rut
		$(document).ready(function(){

			$('#rut').focusout(function(){
				var rut = $('#rut').val();
				if( rut != "" ){
			//Agrega guion, si no lo tiene
			//Elimina los puntos, si los tiene
			var np = parseRut(rut);
			if( Fn.validaRut(np)){
				$('#errorRut').addClass('hidden');
				$('#rut').removeClass('parsley-error');  
				$(':input[type="submit"]').prop('disabled', false);	
			}
			else{
				$('#errorRut').removeClass('hidden');
				$('#rut').addClass('parsley-error');
				$(':input[type="submit"]').prop('disabled', true);					 
			}
			rut = addDots(np);
			$('#rut').val( rut );
		}
		else{            
			$('#rut').removeClass('parsley-error');
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
	//validacion fecha de nacimiento
	$(document).ready(function(){
		$('#birth_date').focusout(function(){
			var birth_date = $('#birth_date').val();
			if( birth_date != "" ){			

				if( moment(birth_date, 'DD/MM/YYYY',true).isValid()){
					$('#errorBirth').addClass('hidden');
					$('#birth_date').removeClass('parsley-error');					 
				}
				else{
					$('#errorBirth').removeClass('hidden');
					$('#birth_date').addClass('parsley-error');					 
				}				
				$('#birth_date').val( birth_date );
			}
			else{            
				$('#birth_date').removeClass('parsley-error');
				$('#errorBirth').addClass('hidden');				 
			}
		});
	});
</script>
<script type="text/javascript">
	//selecion semestres 
	$("select#quality_studies").on("change", function () {    
		var quality_studies = $("#quality_studies").val();
		if(quality_studies=='Técnico' || quality_studies=='Profesional' ){
			$("#semesters_div").show();
		}
		else{
			$("#semesters_div").hide();
		}
	});

	//validar archivo	
$('#file_certificado').bind('change', function() {
	var iSize = ($("#file_certificado")[0].files[0].size / 1024); 
  
  if(iSize >5000){
  	$('#error_certificado').removeClass('hidden');
  	$('#file_certificado').addClass('parsley-error'); 
  }
  else{
  	$('#error_certificado').addClass('hidden');
  	$('#file_certificado').removeClass('parsley-error');
  }

});
	//validar archivo	
$('#file_cedula').bind('change', function() {
var iSize = ($("#file_cedula")[0].files[0].size / 1024); 

   if(iSize >5000){
  	$('#error_cedula').removeClass('hidden');
  	$('#file_cedula').addClass('parsley-error');  
  }
  else{
  	$('#error_cedula').addClass('hidden');
  	$('#file_cedula').removeClass('parsley-error');
  	 $(':input[type="submit"]').prop('disabled', false);
  }

});
</script>
@endsection