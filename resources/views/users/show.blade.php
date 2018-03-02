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
						<h2>Perfil de Usuario</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						@include('flash::message') 
						<div class="col-md-6 col-sm-4 col-xs-12 col-md-offset-3 profile_details">
							<div class="well profile_view">
								<div class="col-sm-12">
									<h4 class="brief"><i>@if( strlen($user->roles->first()->name) < 20 )
										{{ $user->roles->first()->name}}
										@else
										{{ substr($user->roles->first()->name,0 ,10) . "..." }}
									@endif</i></h4>
									<div class="left col-xs-7">
										<h2>@if( strlen($user->name.' '.$user->last_name) < 20 )
											{{ $user->name.' '.$user->last_name }}
											@else
											{{ substr($user->name.' '.$user->last_name,0 ,10) . "..." }}
										@endif</h2>
										<p><strong><i class="fa fa-envelope-o"></i> Email: </strong>  
											{{ $user->email }}											
										</p>
										<ul class="list-unstyled">
											<li><i class="fa fa-calendar"></i> Creado: {{ $user->created_at->format('d-m-Y H:i:s') }}	</li>
											<li><i class="fa fa-calendar"></i> Actualizado: {{ $user->updated_at->format('d-m-Y H:i:s' )}}</li>
										</ul>
									</div>
									<div class="right col-xs-5 text-center">
										<img src="{{ asset('/images/user.png')}}"  alt="" class="img-circle img-responsive">
									</div>
								</div>
								<div class="col-xs-12 bottom text-center">
									<div class="col-xs-12 col-sm-6 emphasis pull-right"> 
										<a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-user"></i> Editar Perfil</a> 
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