Estimado  <i>{{ $responsable->names.' '.$responsable->last_name }}</i>
<br>
<p>Se encuentra disponible un nuevo pago para el contrato Nº{{ $quota->contract_id }}.
Los datos son los siguientes:</p>
 
<p><u>Empleado:</u></p> 
<div>
<p><b>Nombres:</b>&nbsp;{{ $employee->names }}</p>
<p><b>Apellidos:</b>&nbsp;{{ $employee->last_name.' '.$employee->last_name_mother }}</p>
<p><b>Rut:</b>&nbsp;{{  $employee->rut }}</p>
<p><b>Correo:</b>&nbsp;{{  $employee->email }}</p>
</div> 
<p><u>Pago :</u></p> 
<div>
<p><b>Fecha a Pago:</b>&nbsp;{{ $quota->date_to_pay}}</p>
<p><b>Nº Certificado:</b>&nbsp;{{ $quota->number_certificate }}</p>
<p><b>Monto:</b>&nbsp;${{ number_format( $quota->amount,0,",",".")  }}</p>
</div>
 <br/>
Saludos
<br/>
Control de Presupuesto.
<br/>

