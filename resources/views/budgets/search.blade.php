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
                <h2>Lista de Presupuestos </h2>                   
                <div class="clearfix"></div>
              </div>
              <div class="x_content">                    
             <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Año</th> 
                  <th>Monto</th>                                         
                  <th>Numero Empleados</th>  
                  <th>Estado</th> 
                  <th>Acción</th>              
                </tr>
              </thead>
              <tbody>
                @foreach( $budgets as $budget )  
                <tr>  
                  <td>
                    {{ $budget->year }}
                </td> 
                <td>               
                   {{ $budget->amount_total }}
                </td> 

                <td>               
                   {{ $budget->numbers_employees }}
                </td>  
                <td>               
                   {{ $budget->state }}
                </td>  
                  <td>
                    <form action="{{ route('budgets.destroy', $budget) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}                   
                     <a href="{{ route('budgets.edit',['id'=>$budget->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                     <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar</button>
                  </form>
                  </td>
                </tr>
                @endforeach
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