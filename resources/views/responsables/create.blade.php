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
						<h2>Crear Responsable </h2>                  
						<div class="clearfix"></div>
					</div>
					<div class="x_content">               
						@include('flash::message') 
						<form class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/responsables/crear') }}">
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
									<input id="phone" type="text" value="{{ old('phone') }}" data-inputmask="'mask' : '(+99)-9-99999999', 'placeholder': '(+56)-9-99999999'" class="form-control col-md-7 col-xs-12 @if($errors->has('phone')) parsley-error @endif"
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
            }
            else{
            	$('#errorRut').removeClass('hidden');
            	$('#rut').addClass('parsley-error');
            }
            rut = addDots(np);
            $('#rut').val( rut );
        }
        else{            
        	$('#rut').removeClass('parsley-error');
        	$('#errorRut').addClass('hidden');
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
@endsection