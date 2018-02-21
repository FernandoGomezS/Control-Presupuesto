 @extends('layouts.home')
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
                            <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4  ">
                              <h4 class="modal-title" id="myModalLabel">Seleccione una opción</h4>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_crear">Crear empleado</button>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_buscar">Buscar empleado</button>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-4 profile_details">
                              <div class="well profile_view">
                                <div class="col-sm-12">
                                  <h4 class="brief"><i>Empleado Seleccionado</i></h4>
                                  <div class="left col-xs-12">
                                    <h2>Nicole Pearson Gonzals</h2>
                                    <p><strong>RUT: </strong> 12.345.678-9 </p>
                                    <ul class="list-unstyled">
                                      <li><i class="fa fa-envelope"></i> Email: asdas@adas.cl </li>
                                      <li><i class="fa fa-phone"></i> Teléfono: 12345432</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="step-2">
                        <div class="ln_solid"></div>
                        <form class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estudio">Función<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="estudio" name="estudio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estudio">N° Partidos/Jornada<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="estudio" name="estudio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Continuidad</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control">
                                <option>Transitorio </option>
                                <option>Permanente</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estudio">Mensual<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="estudio" name="estudio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estudio">Anual<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="estudio" name="estudio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Horas<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="monto" name="monto" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Valores<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="monto" name="monto" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Fecha  de Inicio <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="control-group">
                                <div class="controls">
                                  <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Fecha  de Termino <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="control-group">
                                <div class="controls">
                                  <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="step-3">
                        <div class="ln_solid"></div>
                        <form class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estudio">Nombre Presupuesto<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="estudio" name="estudio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Responsable</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control">
                                <option>Juan Perez </option>
                                <option>Isabel Gonzalez</option>
                                <option>Sol Vera</option>
                                <option>Juan Miguel Perez </option>
                                <option>Josefa Danich </option>
                                <option>Soledad Alcaino</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Componente</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control">
                                <option>COMPONENTE ESCOLAR </option>
                                <option>COMPONENTE FEDERADO</option>
                                <option>COMPONENTE LIGAS DE EDUCACION SUPERIOR</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Etapa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control">
                                <option>Etapa Comunal </option>
                                <option>Etapa Provincial  </option>
                                <option>Etapa Regional   </option>
                                <option>Etapa Nacional </option>
                                <option>JUEGOS PREDERPORTIVOS ESCOLARES </option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Etapa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control">
                                <option>La Florida </option>
                                <option>La Pintana </option>
                                <option>Pirque </option>
                                <option>Puente Alto </option>
                                <option>San José de Maipo </option>
                                <option>La Reina</option>
                                <option>Las Condes </option>
                                <option>Lo Barnechea    </option>
                                <option>Macul </option>
                                <option>Ñuñoa </option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Monto<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="monto" name="monto" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        </form>
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
                                      <i class="fa fa-id-card-o" aria-hidden="true"></i> Contrato
                                      <small class="pull-right">Estado: Firma Contrato </small>                                    
                                    </h3>
                                    <div class="clearfix"></div>
                                  </div>
                                  <!-- info row -->
                                  <div class="row invoice-info">
                                    <div class="col-sm-3 invoice-col">
                                      <address>          
                                        <br>Empleado: <strong>Iron Admin Inc.</strong>                        
                                        <br>Rut : 12.345.678-9                                 
                                        <br>Teléfono: 1 (804) 123-9876
                                        <br>Correo: iron12312@ironadmin.com
                                      </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 invoice-col">
                                      <address> 
                                        <br>Responsable: <strong>John Doe</strong>                                 
                                        <br>Rut : 12.345.678-9                                  
                                        <br>Teléfono: 1 (804) 123-9876
                                        <br>correo: jon@ironadmin.com
                                      </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 invoice-col">
                                      <br>
                                      <b>Numero: 007612</b>                                
                                      <br>
                                      <b>Fecha Inicio:</b> 02/02/2018
                                      <br>
                                      <b>Fecha Termino:</b> 02/12/2018
                                      <br>
                                      <b>Monto:</b> 3.630.000
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 invoice-col">
                                      <address>  
                                        <br>   
                                        <b>Función:</b>
                                        Monitor deportivo                                 
                                        <br>
                                        <b>Componente:</b> Componente Escolar
                                        <br>
                                        <b>Tipo Etapa:</b> Etapa Comunal
                                        <br>
                                        <b>Etapa:</b> La Granja
                                      </address>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <!-- Table row -->
                                  <div class="row">
                                    <div class="col-xs-12 table">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>Pago</th>
                                            <th>Estado</th>
                                            <th>Fecha de Pago</th>
                                            <th>Subtotal</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>1</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>2</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>3</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>4</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>5</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>6</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>7</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>8</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>9</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>10</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>11</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
                                          <tr>
                                            <td>12</td>
                                            <td>Por pagar</td>
                                            <td>02/03//2018</td>
                                            <td>$302.500</td>
                                          </tr>
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
                                      <p class="lead">Resumen al 02/02/2018</p>
                                      <div class="table-responsive">
                                        <table class="table">
                                          <tbody>
                                            <th>Pagado:</th>
                                            <td>$0</td>
                                            </tr>
                                            <tr>
                                              <th>Por pagar:</th>
                                              <td>$3.630.000</td>
                                            </tr>
                                            <tr>
                                              <th>Total:</th>
                                              <td>$3.630.000</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- /.col -->
                                  </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- Modal buscar empleado -->
        <div class="modal fade modal_buscar" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Buscar Empleado</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Ingrese Rut</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-primary">Buscar</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">  
                    <br>
                    <br>No existen resultados.
                    <br>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal nuevo empleado -->
        <div class="modal fade modal_crear" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Empleado</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombres">Nombres <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_paterno">Apellido Paterno <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="apellido_paterno" name="apellido_paterno" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_materno">Apellido Materno <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="apellido_materno" name="apellido_materno" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut">Rut <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="rut" name="rut" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Fecha de Nacimiento <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date"class="form-control" required="required" class="form-control col-md-7 col-xs-12" > 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="domicilio">Domicilio <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="apellido_materno" name="domicilio" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comuna">Comuna <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="comuna" name="comuna" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">AFP</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control">
                        <option value="">-- Por favor seleccione --</option>
                        <option>Capital</option>
                        <option>Cuprum</option>
                        <option>Habitat</option>
                        <option>Modelo</option>
                        <option>Planvital</option>
                        <option>Provida</option>
                        <option>Pensionado</option>
                        <option>No Tiene</option>
                        <option>Otra</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Salud</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control">
                        <option value="">-- Por favor seleccione --</option>
                        <option>Fonasa</option>
                        <option>Banmédica </option>
                        <option>Colmena  </option>
                        <option>Consalud </option>
                        <option>Cruz Blanca </option>
                        <option>Nueva Masvida </option>
                        <option>Vida Tres</option>
                        <option>No Tiene</option>
                        <option>Otra</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Telefono<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="telefono" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profesion">Profesión/oficio <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="profesion" name="profesion" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Calidad de Estudios</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control">
                        <option value="">-- Por favor seleccione --</option>
                        <option>Profesional</option>
                        <option>Técnico </option>
                        <option>Experto </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semestres">Semestres cursados<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" id="semestre" name="semestres" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semestres">Adjuntar cedula de identidad<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="btn-group">                                    
                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semestres">Adjuntar certificado<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="btn-group">
                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Crear empleado</button>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('script')
<script src="{{ asset('/assets/app/js/jquery.smartWizard.js')}}"></script>
@endsection