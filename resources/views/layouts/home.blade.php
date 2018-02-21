<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">         
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">    

    {{--Common App Styles--}}
    <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/ico" />
    <link href="{{ asset('/assets/app/css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/admin/css/admin.css')}}" rel="stylesheet">        


    {{--Styles--}}
    @yield('styles')

    {{--Head--}}
    @yield('head')

</head>
<body class="nav-md">

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-archive"></i> <span>Presupuesto </span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{ asset('/images/user.png')}}" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
              <span>Bienvenido,</span>
              <h2>Administrador</h2>
          </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="/"><i class="fa fa-home"></i> Inicio </a>                    
                  </li>
                  <li><a><i class="fa fa-edit"></i> Contratos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">      
                          <li><a href="/contratos/crear/">Crear contratos</a></li>                      
                          <li><a href="/contratos/buscar">Buscar contratos</a></li>                     
                      </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Presupuesto <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">                      
                          <li><a href="/presupuestos/buscar">Buscar Presupuestos</a></li>                      
                      </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Empleados <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="/empleados/crear">Crear Empleado</a></li>
                          <li><a href="/empleados/buscar">Buscar Empleados</a></li>                 
                      </ul>
                  </li>  
                  <li><a><i class="fa fa-users"></i> Responsables <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="/responsables/crear">Crear Responsable</a></li>
                          <li><a href="/responsables/buscar">Buscar Responsables</a></li>                 
                      </ul>
                  </li>                    
              </ul>
          </div>
          <div class="menu_section">
              <h3>Administración</h3>
              <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="/usuarios/crear">Crear Usuario</a></li>
                          <li><a href="/usuarios/buscar">Buscar Usuarios</a></li>                 
                      </ul>
                  </li>  
                  <li><a><i class="fa fa-list-alt"></i> Presupuesto <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="/presupuestos/crear">Crear Presupuesto</a></li>
                          <li><a href="/presupuestos/buscar">Buscar Presupuestos</a></li>                 
                      </ul>
                  </li>                                               
              </ul>
          </div>

      </div>
      <!-- /sidebar menu -->

  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
      <nav>
          <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
              <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{ asset('/images/user.png')}}" alt="">Administrador
                      <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="javascript:;"> Mi Perfil</a></li>
                      <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
              </li>
          </ul>
      </nav>
  </div>
</div>
<!-- /top navigation -->

{{--Page--}}
@yield('content')


<!-- footer content -->
<footer>
  <div class="pull-right">
      Control de Presupuesto
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->

{{--Common Scripts--}}


<script src="{{ asset('/assets/app/js/app.js')}}"></script>
<script src="{{ asset('/assets/admin/js/admin.js')}}"></script>



{{--Scripts--}}
@yield('scripts')
</body>
</html>
