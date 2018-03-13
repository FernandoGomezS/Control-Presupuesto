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
            <h2>Contratos</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @include('flash::message') 
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Empleado</th>
                  <th>Responsable</th>                          
                  <th>Fecha Inicio</th>
                  <th>Fecha Término</th>
                  <th>Estado</th>
                  <th>Monto</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $contracts as $contract )  
                <tr>  
                  <td>     
                    {{ $contract->id }}                    
                  </td> 
                  <td>  
                    {{ $contract->employees->names.' '.$contract->employees->last_name }}                         
                  </td>
                  <td>               
                    {{ $contract->responsables->names }}  
                  </td>  
                  <td>  
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y')}}
                  </td>  
                  <td> 
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y')}}
                  </td>
                  <td>              
                    {{ $contract->state_contract }}
                  </td>
                  <td>$               
                    {{ number_format( $contract->amount_total,0,",",".") }}
                  </td>
                  <td>        
                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">Cambiar Estado <span class="caret"></span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="#">Contrato</a>
                        </li>
                        <li><a href="{{ route('quotas.edit',['id'=>$contract->id]) }}" >Cuotas</a>
                        </li>                        
                      </ul>
                    </div>

                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Acciones <span class="caret"></span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="{{ route('contracts.show',['id'=>$contract->id]) }}">Ver</a>
                        </li>
                        <li><a href="{{ route('contracts.edit',['id'=>$contract->id]) }}">Editar</a>
                        </li>
                        <li><a data-toggle="modal" data-target="#modal-delete" data-delete-link="{{ route('contracts.destroy', $contract) }}" class=" delete-court-button">Eliminar</a>
                        </li>
                        
                      </ul>
                    </div>
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



<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Confirmación</h4>
      </div>
      <div class="modal-body">
        <p>Está a punto de eliminar este Contrato..¿Está seguro(a) de proceder?</p>                                                 
      </div>
      <div class="modal-footer">
        <form  id="delete-court-form" method="POST" action="">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="button" class="btn btn-default" data-dismiss="modal">No, cancelar</button>
          <button type="submit" class="btn btn-danger "> Si, Eliminar</button>    

        </form>                      
      </div>

    </div>
  </div>
</div>
<!-- /modals -->

<!-- /page content -->
@section('scripts')
<script type="text/javascript">
  $('.delete-court-button').on('click', function () {
    $('#delete-court-form').attr('action', $(this).data('delete-link'));
  });
</script>
@endsection

@endsection