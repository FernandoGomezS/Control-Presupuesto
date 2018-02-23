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
            <h2>Usuarios</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nombres</th>                                          
                  <th>Rol</th>  
                  <th>Correo</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>

                @foreach( $users as $user )  
                <tr>  
                  <td>               
                    @if( strlen($user->name) < 20 )
                    {{ $user->name }}
                    @else
                    {{ substr($user->name,0 ,10) . "..." }}
                  @endif
                </td>  
                <td>               
                    @if( strlen($user->role->name) < 20 )
                    {{ $user->role->name }}
                    @else
                    {{ substr($user->role->name,0 ,10) . "..." }}
                  @endif
                </td>  
                <td>               
                    @if( strlen($user->email) < 20 )
                    {{ $user->email }}
                    @else
                    {{ substr($user->email,0 ,10) . "..." }}
                  @endif
                </td>  
                  <td>
                    <a href="{{ route('users.show',['id'=>$user->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                    <a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                    <a href="{{ route('users.show',['id'=>$user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
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