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
                    <h2>Responsable</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nombres</th>
                          <th>Apellidos</th>                          
                          <th>RUT</th>                          
                          <th>Fecha Creación</th>  
                          <th>Correo</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tiger</td>
                          <td>Nixon</td>                          
                          <td>12.345.678-9</td>                          
                          <td>2011/04/25</td>   
                          <td>t.nixon@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Garrett</td>
                          <td>Winters</td>
                         <td>12.345.678-9</td>         
                          <td>2011/07/25</td>
                          <td>g.winters@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Ashton</td>
                          <td>Cox</td>
                          <td>12.345.678-9</td>                            
                          <td>2009/01/12</td>
                          <td>a.cox@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Cedric</td>
                          <td>Kelly</td>
                         <td>12.345.678-9</td>                            
                          <td>2012/03/29</td>                          
                          <td>c.kelly@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Airi</td>
                          <td>Satou</td>
                         <td>12.345.678-9</td>      
                          <td>2008/11/28</td>
                          <td>a.satou@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Brielle</td>
                          <td>Williamson</td>
                          <td>12.345.678-9</td>                              
                          <td>2012/12/02</td>   
                          <td>b.williamson@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Herrod</td>
                          <td>Chandler</td>
                          <td>12.345.678-9</td>                           
                          <td>2012/08/06</td>                       
                          <td>h.chandler@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Rhona</td>
                          <td>Davidson</td>
                          <td>12.345.678-9</td>                             
                          <td>2010/10/14</td>                      
                          <td>r.davidson@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Colleen</td>
                          <td>Hurst</td>
                          <td>12.345.678-9</td>                         
                          <td>2009/09/15</td>                      
                          <td>c.hurst@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Sonya</td>
                          <td>Frost</td>
                          <td>12.345.678-9</td>                           
                          <td>2008/12/13</td>                      
                          <td>s.frost@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                       

                        </tr>
                        <tr>
                          <td>Jena</td>
                          <td>Gaines</td>
                          <td>12.345.678-9</td>                         
                          <td>2008/12/19</td>                      
                          <td>j.gaines@datatables.net</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>

        </div>
      </div>
    </div>
    <!-- /page content -->

@endsection