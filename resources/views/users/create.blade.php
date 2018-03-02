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
            <h2>Crear Usuario </h2>                  
            <div class="clearfix"></div>
          </div>
          <div class="x_content">               
            @include('flash::message') 
            <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/usuarios/crear') }}">
              {!! csrf_field() !!}             
              <h4 class="section">Completar Información</h4>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                  Nombre
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" type="text" value="{{ old('name') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
                  name="name"  required>
                  @if($errors->has('name'))
                  <ul class="parsley-errors-list filled">
                    @foreach($errors->get('name') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                  </ul>
                  @endif
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                  Apellido
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" type="text" value="{{ old('last_name') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('last_name')) parsley-error @endif"
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                  Email
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" type="email" value="{{ old('email') }}" class="form-control col-md-7 col-xs-12 @if($errors->has('email')) parsley-error @endif"
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Tipo de Usuario <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">  
                  <select class='form-control' id='role_id' name="role_id" required="">
                    <option value="">-- Por favor seleccione --</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                  </select>                      
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">
                  Contraseña
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password" type="password" class="form-control col-md-7 col-xs-12 @if($errors->has('password')) parsley-error @endif"
                  name="password" required>
                  @if($errors->has('password'))
                  <ul class="parsley-errors-list filled">
                    @foreach($errors->get('password') as $error)
                    <li class="parsley-required">{{ $error }}</li>
                    @endforeach
                  </ul>
                  @endif
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