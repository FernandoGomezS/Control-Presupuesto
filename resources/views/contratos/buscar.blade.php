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
          <h2>Lista de Contratos </h2>                   
          <div class="clearfix"></div>
        </div>
        <div class="x_content">                    
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Contratado</th>
                <th>Responsable</th>                          
                <th>Fecha inicio</th>
                <th>Fecha termino</th>
                <th>Estado</th>
                <th>Monto</th>
                <th>Acción</th>
              </tr>
            </thead>


            <tbody>
              <tr>
                <td>1</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>Pagado</td>
                <td>$320,800</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>Pagado</td>
                <td>$170,750</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>Firma de Contrato</td>
                <td>$86,000</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>Firma de Contrato</td>
                <td>$433,060</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>A pago</td>
                <td>$162,700</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>A pago</td>
                <td>$372,000</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>7</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>Contratación</td>
                <td>$137,500</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>Firma de Contrato</td>
                <td>$327,900</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>Contratación</td>
                <td>$205,500</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>10</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>Contratación</td>
                <td>$103,600</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>11</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>Contratación</td>
                <td>$90,560</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>12</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>A pago</td>
                <td>$342,000</td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
                </td>
              </tr>
              <tr>
                <td>13</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>Contratación</td>
                <td>$470,600</td>
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