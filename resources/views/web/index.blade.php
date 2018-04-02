@extends('layouts.home')
@section('content')

@if($budget!=null )
<div class="right_col" role="main">
	<h2>Presupuesto {{ $budget->year}}</h2>
	<!-- top tiles -->
	<div class="row top_tiles">
		<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-user"></i></div>
				<div class="count">{{ number_format($budget->contracted_employees,0,",",".") }}</div>
				<h3>Total de Contratos </h3>                  
			</div>
		</div>
		<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-calendar-check-o"></i></div>
				<div class="count">{{ number_format($budget->numbers_employees-$budget->contracted_employees,0,",",".") }}</div>
				<h3>Contratos Disponibles</h3>                
			</div>
		</div>
		<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-usd"></i></div>
				<div class="count">{{ number_format($budget->amount_total-$budget->amount_spent,0,",",".") }}</div>
				<h3>Presupuesto Disponible</h3>                  
			</div>
		</div>              
	</div>
	<!-- /top tiles -->      
	<br />
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320">
				<div class="x_title">
					<h2>Saldos de Competencias</h2>                  
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Competencia</th>
								<th>Saldo Gastado</th>
								<th>Saldo Diponible</th>                               
							</tr>
						</thead>
						<tbody>
							@foreach( $competencias as $competencia )  
							<tr>                                  
								<td>Competencia {{ $competencia->name }}</td>
								<td>${{ number_format($competencia->amount_spent,0,",",".") }}</td>
								<td>${{ number_format($competencia->amount_total-$competencia->amount_spent,0,",",".") }}</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
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
										<td> {{  number_format( ($sumPaid*100)/$budget->amount_total ,2) }}%</td>
									</tr>
									<tr>
										<td>
											<p><i class="fa fa-square green"></i>Por pagar</p>
										</td>
										<td>   {{ number_format( (($budget->amount_spent-$sumPaid)*100)/$budget->amount_total,2)  }}%</td>
									</tr>
									<tr>
										<td>
											<p><i class="fa fa-square red"></i>No Asignado </p>
										</td>
										<td>  {{ number_format( (($budget->amount_total-$budget->amount_spent)*100)/$budget->amount_total  ,2) }}%</td>
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
							@foreach( $contracts as $contract )  
							<li>
								<div class="block">
									<div class="block_content">
										<h2 class="title">
											<a>{{ $contract->employees->names.' '.$contract->employees->last_name }}</a>
										</h2>
										<div class="byline">
											<span> {{ \Carbon\Carbon::parse($contract->created_at)->format('d/m/Y') }}
											</span> responsable <a>{{ $contract->responsables->names }}</a>
										</div>                             
									</div>
								</div>
							</li>
							@endforeach           
						</ul>
					</div>
				</div>
			</div>
		</div>          
	</div>
</div>
@else
<div class="right_col" role="main">
	<h1> No Existe Presupuesto Activo.</h1>
	<h1> Administrador Ir a Presupuesto->Buscar y activar un presupuesto.</h1>
</div>>
<br>
@endif
@endsection
@section('scripts')
<script src="{{ asset('/assets/app/js/Chart.min.js')}}"></script>
<script type="text/javascript">
	
	function init_chart_doughnut(){

		if( typeof (Chart) === 'undefined'){ return; }
		
		console.log('init_chart_doughnut');

		if ($('.canvasDoughnut').length){
			
			var chart_doughnut_settings = {
				type: 'doughnut',
				tooltipFillColor: "rgba(51, 51, 51, 0.55)",
				data: {
					labels: [
					"Libre",	
					"Por Pagar",	
					"Pagado"
					],
					datasets: [{
						data: [{{ (($budget->amount_total-$budget->amount_spent)*100)/$budget->amount_total }}, {{ (($budget->amount_spent-$sumPaid)*100)/$budget->amount_total }}, {{ ($sumPaid*100)/$budget->amount_total }}],
						backgroundColor: [	
						"#E74C3C",
						"#26B99A",
						"#3498DB"
						],
						hoverBackgroundColor: [				
						
						"#E95E4F",
						"#36CAAB",
						"#49A9EA"
						]
					}]
				},
				options: { 
					legend: false, 
					responsive: false 
				}
			}

			$('.canvasDoughnut').each(function(){
				
				var chart_element = $(this);
				var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);
				
			});			

		}  

	}
</script>
@endsection