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
            <h2>Empleados</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @include('flash::message') 
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nombres</th> 
                  <th>Apellidos</th>                                         
                  <th>Rut</th>  
                  <th>Correo</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $employees as $employee )  
                <tr>  
                  <td>               
                    @if( strlen($employee->names) < 20 )
                    {{ $employee->names }}
                    @else
                    {{ substr($employee->names,0 ,10) . "..." }}
                    @endif
                  </td> 
                  <td>               
                    @if( strlen($employee->last_name) < 20 )
                    {{ $employee->last_name }}
                    @else
                    {{ substr($employee->last_name,0 ,10) . "..." }}
                    @endif
                  </td> 

                  <td>               
                    @if( strlen($employee->rut) < 20 )
                    {{ $employee->rut}}
                    @else
                    {{ substr($employee->rut,0 ,10) . "..." }}
                    @endif
                  </td>  
                  <td> 
                    {{ $employee->email }}
                  </td>  
                  <td>                    
                    <a href="{{ route('employees.show',['id'=>$employee->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Ver </a>
                    <a href="{{ route('employees.edit',['id'=>$employee->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                    <button type="button" data-toggle="modal" data-target="#modal-delete" data-delete-link="{{ route('employees.destroy', $employee) }}" class="btn btn-danger btn-xs delete-court-button"><i class="fa fa-trash-o"></i> Eliminar</button>
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
        <p>Está a punto de eliminar este empleado...¿Está seguro(a) de proceder?</p>                                                 
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