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

                <form class="form-horizontal form-label-left" novalidate>

                  <h4 class="section">Completar Información</h4>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombres <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="nombres"  required="required" type="text">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Paterno <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="apellido_paterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="name"  required="required" type="text">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Materno <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="apellido_materno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="apellido_materno"  required="required" type="text">
                    </div>
                  </div>                      
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Tipo de Usuario <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">                    
                      <select class="form-control" required="">
                        <option value="">-- Por favor seleccione --</option>
                        <option>Administrador</option>
                        <option>Supervisor</option>
                        <option>Otro</option>                       
                      </select>                      
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="password" class="control-label col-md-3">Contraseña </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir Contraseña</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                  </div>
                  <div class="item form-group">

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancelar</button>
                        <button id="send" type="submit" class="btn btn-success">Crear</button>
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