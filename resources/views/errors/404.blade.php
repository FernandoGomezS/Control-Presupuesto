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
    <title>Control de Presupuesto </title>

</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2>Sorry but we couldn't find this page</h2>
              <p>This page you are looking for does not exist 
              </p>
              <div class="mid_center">
                <h3>Search</h3>
                <form>
                  <div class="col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    
<script src="{{ asset('/assets/app/js/app.js')}}"></script>
<script src="{{ asset('/assets/admin/js/admin.js')}}"></script>
  </body>
</html>
