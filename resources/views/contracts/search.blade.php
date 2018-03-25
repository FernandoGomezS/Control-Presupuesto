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
                   @if( strlen($contract->employees->names.' '.$contract->employees->last_name) < 20 )
                    {{ $contract->employees->names.' '.$contract->employees->last_name }}   
                    @else
                    {{ substr($contract->employees->names.' '.$contract->employees->last_name,0 ,20) . "..." }}
                    @endif                                           
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
                  @if( $contract->state_contract=='Firma contrato')
                  <td><span class="label label-warning">{{ $contract->state_contract }}</span></td>  
                  @endif
                  @if( $contract->state_contract=='Contratado')
                  <td><span class="label label label-info">{{ $contract->state_contract }}</span></td> 
                  @endif
                  @if( $contract->state_contract=='Pagado')
                  <td><span class="label label label-success">{{ $contract->state_contract }}</span></td>  
                  @endif
                  @if( $contract->state_contract=='Cancelado')
                  <td><span class="label label label-danger">{{ $contract->state_contract }}</span></td>  
                  @endif
                  @if( $contract->state_contract=='Renuncia')
                  <td><span class="label label label-default">{{ $contract->state_contract }}</span></td>  
                  @endif
                  <td>             
                    {{ number_format( $contract->amount_total,0,",",".") }}
                  </td>
                  <td>        
                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">Cambiar Estado <span class="caret"></span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                        @if( $contract->state_contract=='Firma contrato') 
                        <li><a  data-toggle="modal" data-target="#modal-2" onclick="modalStateContract('{{ route('contracts.updateState', $contract) }}','{{ $contract->id }}')" class=" delete-court-button2">Contrato</a>
                        </li>
                        @endif  
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
                        <li><a data-toggle="modal" data-target="#modal-delete" onclick="modalCancel( '{{ route('contracts.destroy', $contract) }}' ) " class=" delete-court-button" >Cancelar</a>
                        </li>
                      </ul>
                    </div>
                    <div class="btn-group">
                      <a href="{{ route('contracts.pdf', $contract) }}" class="btn btn-xs btn-primary">Formulario</a>
                    </div>
                  </td>
                </tr>           
                @endforeach                
              </tbody>
            </table>
            @if (isset($contract))
            <div class="col-md-8 col-xs-12 invoice-col">
              <a href="" class="btn btn-sm btn-success">
                Generar Excel Contratos
              </a>
            </div>
            @endif          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- modal -->

<div class="modal fade bs-example-modal-lg"  id="modal-2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Estado  a Contratado  </h4>
      </div>
      <form  id="delete-court-form2" class="form-horizontal form-label-left" method="POST" action="/">
        {{ csrf_field() }}
        {{ Form::hidden('state_quota', 'Pagado') }}  
        {{ Form::hidden('id', '0 ', array('id' => 'id_quota2')) }}
        <div class="modal-body">          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_memo_contract" >
              Nº de Memo Contratación
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="number_memo_contract"  type="number" class="form-control col-md-7 col-xs-12 "
              name="number_memo_contract"  required>                       
            </div>
          </div> 
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_memo_contract" >
              Fecha Memo Contratación
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="date_memo_contract" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 "
              name="date_memo_contract"  required> 
              <ul id="errorDateMemoToPay" class="parsley-errors-list hidden">                    
                <li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
              </ul>                     
            </div>
          </div>              
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_signature_contract" >
              Fecha Firma Contrato
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="date_signature_contract" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control col-md-7 col-xs-12 "
              name="date_signature_contract"  required>
              <ul id="errorDatePaid" class="parsley-errors-list hidden">                    
                <li class="parsley-required">Fecha Incorrecta. (Día/Mes/Año).</li>                    
              </ul>                       
            </div>
          </div>  

        </div>
        <div class="modal-footer">  
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success " id="button_2"> Editar</button>  
        </div>
      </form> 

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
        <p>Está a punto de Cancelar este Contrato..¿Está seguro(a) de proceder?</p>                                                 
      </div>
      <div class="modal-footer">
        <form  id="delete-court-form" method="POST" action="">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="button" class="btn btn-default" data-dismiss="modal">No, Volver</button>
          <button type="submit" class="btn btn-danger "> Si, Cancelar</button>   
        </form>                      
      </div>

    </div>
  </div>
</div>
<!-- /modals -->

<!-- /page content -->
@section('scripts')
<script src="{{asset('/assets/app/js/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('/assets/app/js/moment.js')}}"></script>
<script type="text/javascript">



function modalCancel(data){ 
 $('#delete-court-form').attr('action', data);
};

function modalStateContract(data,data2){ 
 $('#delete-court-form2').attr('action', data);
 $('#id_quota2').attr('value', data2); 
};


$('#date_signature_contract').keyup(function(){
  var date_signature_contract = $('#date_signature_contract').val();
  if( date_signature_contract != "" ){     

    if( moment(date_signature_contract , 'DD/MM/YYYY',true).isValid()){
      $('#errorDatePaid').addClass('hidden');
      $('#date_signature_contract').removeClass('parsley-error'); 
      var validate_date1 =$("#errorDateMemoToPay").is(":visible");
      if(!validate_date1){
        $('#button_2').prop('disabled', false);  
      }         
    }
    else{
      $('#errorDatePaid').removeClass('hidden');
      $('#date_signature_contract').addClass('parsley-error');  
      $('#button_2').prop('disabled', true);         
    }       
    $('#date_signature_contract').val( date_signature_contract );
  }
  else{            
    $('#date_signature_contract').removeClass('parsley-error');
    $('#errorDatePaid').addClass('hidden');
    var validate_date1 =$("#errorDateMemoToPay").is(":visible");
    if(!validate_date1){
      $('#button_2').prop('disabled', false);  
    }         
  }
});
$('#date_memo_contract').keyup(function(){
  var date_memo_contract = $('#date_memo_contract').val();
  if( date_memo_contract != "" ){     

    if( moment(date_memo_contract , 'DD/MM/YYYY',true).isValid()){
      $('#errorDateMemoToPay').addClass('hidden');
      $('#date_memo_contract').removeClass('parsley-error');
      var validate_date1 =$("#errorDatePaid").is(":visible");
      if(!validate_date1){
        $('#button_2').prop('disabled', false);  
      }

    }
    else{
      $('#errorDateMemoToPay').removeClass('hidden');
      $('#date_memo_contract').addClass('parsley-error');  
      $('#button_2').prop('disabled', true);         
    }       
    $('#date_memo_contract').val( date_memo_contract );
  }
  else{            
    $('#date_memo_contract').removeClass('parsley-error');
    $('#errorDateMemoToPay').addClass('hidden');
    var validate_date1 =$("#errorDatePaid").is(":visible");
    if(!validate_date1){
      $('#button_2').prop('disabled', false);  
    }       
  }
});
</script>
@endsection

@endsection