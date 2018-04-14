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
						<h2>Perfil de Empleado </h2>                   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<img class="img-responsive avatar-view" src="{{ asset('/images/user.png')}}" alt="Avatar" title="Change the avatar">
								</div>
							</div>
							<h3>{{  $employee->names.' '.$employee->last_name.' '.$employee->last_name_mother}}</h3>

							<ul class="list-unstyled user_data">
								<li><i class="fa fa-map-marker user-profile-icon"></i> {{ $employee->address.','.$employee->commune.'.' }}
								</li>
								<li>
									<i class="fa fa-envelope-o user-profile-icon"></i> {{ $employee->email }} 
								</li>	
								<li>
									<i class="fa fa-id-card-o user-profile-icon"></i> Rut: {{ $employee->rut }} 
								</li>
								<li>
									<i class="fa fa-phone user-profile-icon"></i> {{ $employee->phone }} 
								</li>
							</ul>

							<a href="{{ route('employees.edit',['id'=>$employee->id]) }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
							<br />

						</div>
						<div class="col-md-9 col-sm-9 col-xs-12">                     

							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Contratos Adquiridos </a>
									</li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Más Datos</a>
									</li>                         
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
										<!-- start user projects -->
										<table class="data table table-striped no-margin">
											<thead>
												<tr>
													<th>Funcion</th>
													<th>Inicio</th>
													<th>Termino</th>
													<th>Estado</th>
													<th>Ver</th>
												</tr>
											</thead>
											<tbody>
												
												@foreach( $contracts as $contract )  
												<tr>
													<td>{{ $contract->function }}</td>
													<td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_start)->format('d/m/Y') }}</td>
													<td>{{  \Carbon\Carbon::createFromFormat('Y-m-d', $contract->date_finish)->format('d/m/Y') }}</td>
													<td>{{ $contract->state_contract }}</td>
													<td> <a href="{{ route('contracts.show',['id'=>$contract->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Ver </a></td>
												</tr>												
												@endforeach
												
											</tbody>
										</table>
										@if ($contracts->isEmpty()) 
										<p> No existen contratos para este empleado.</p>	
										@endif
										<!-- end user projects -->
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
										<div class="col-md-12 ">
											<div class="row">
												<div class="col-xs-12 invoice-header">
													<h1>
														<i class="fa fa-info-circle"></i> Información
													</h1>													
												</div>												
												<!-- /.col -->
											</div>
											<br>
											<div class="row invoice-info">
												<div class="col-sm-6 invoice-col">													
													<address>
														<strong>Fecha de Nacimiento: </strong>{{ $employee->birth_date}}
														<br>
														<strong>AFP: </strong>{{ $employee->afps->name}}
														<br>
														<strong>Salud: </strong>{{ $employee->healths->name}}
														<br>
														<strong>Profesión: </strong>{{ $employee->profession}}		
													</address>
												</div>
												<!-- /.col -->
												<div class="col-sm-6 invoice-col">													
													<address>
														<strong>Calidad de Estudios: </strong>{{ $employee->quality_studies}}
														<br>
														<strong>Semestres:</strong>
														@if ($employee->semesters!=null) 
														{{ $employee->semesters}}
														@else
														No aplica	
														@endif
														<br>														
														<strong>Creado: </strong> {{ $employee->created_at->format('d-m-Y H:i:s') }}
														<br>
														<strong>Actualizado: </strong>{{ $employee->updated_at->format('d-m-Y H:i:s' )}}
													</address>
												</div>
												<!-- /.col -->
											</div>
											<div class="row invoice-info">
												<div class="col-sm-6 invoice-col">	
													<h5>Archivos Adjuntos</h5>
													<ul class="list-unstyled project_files">                         
														<li><a target="_blank"  href="{{ Storage::url($employee->url_certificate) }}"><i class="fa fa-picture-o"></i> Ver Certificado de estudios</a>
														</li>                            
														<li><a target="_blank"  href="{{ Storage::url($employee->url_identification) }}"><i class="fa fa-picture-o"></i> Ver Cédula de identidad</a>
														</li> 
                          							</ul>
												</div>
												<!-- /.col -->	
											</div>
										</div>
									</div>                         
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection