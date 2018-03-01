@extends('layouts.home')
@section('content')
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count">179</div>
                  <h3>Total de Contratos </h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-calendar-check-o"></i></div>
                  <div class="count">102</div>
                  <h3>Contratos pagados</h3>                
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-usd"></i></div>
                  <h3>Saldo Presupuesto</h3>                  
                </div>
              </div>              
            </div>
          <!-- /top tiles -->

       
          <br />

          <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Consumo del presupuesto</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4></h4>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Peñalolén</span>
                    </div>
                    <div class="w_center w_40">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_35">
                      <span>12.434.322</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Maipú</span>
                    </div>
                    <div class="w_center w_40">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_35">
                      <span>5.300.543</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Estación Central</span>
                    </div>
                    <div class="w_center w_40">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_35">
                      <span>2.332.133</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>Pedro Aguirre Cerda</span>
                    </div>
                    <div class="w_center w_40">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_35">
                      <span>2.000.000</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>FÚTBOL</span>
                    </div>
                    <div class="w_center w_40">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_35">
                      <span>1.000.000</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Presupuesto Total</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Grafico</p>
                      </th>
                      <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Estado</p>
                        </div>  
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Procentaje</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Pagado </p>
                            </td>
                            <td>40%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Por pagar</p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>No Asignado </p>
                            </td>
                            <td>40%</td>
                          </tr>                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
   

       
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Contrataciones Recientes </h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                               <a>Juan Perez Gonzalez</a>
                               </h2>
                            <div class="byline">
                              <span> 10/02/2018</span> responsable <a>Jane Smith</a>
                            </div>                             
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                          <h2 class="title">
                               <a>Juan Perez Gonzalez</a>
                               </h2>
                            <div class="byline">
                              <span> 10/02/2018</span> responsable <a>Jane Smith</a>
                            </div>
                            
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                               <a>Juan Perez Gonzalez</a>
                               </h2>
                            <div class="byline">
                             <span> 10/02/2018</span> responsable <a>Jane Smith</a>
                            </div>
                           
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                               <a>Juan Perez Gonzalez</a>
                               </h2>
                            <div class="byline">
                              <span> 10/02/2018</span> responsable <a>Jane Smith</a>
                            </div>
                            
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          
          </div>
        </div>
@endsection