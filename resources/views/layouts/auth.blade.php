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
    <title>control de Presupuesto </title>

</head>
<body class="login">

{{--Page--}}
@yield('content')


{{--Common Scripts--}}


<script src="{{ asset('/assets/app/js/app.js')}}"></script>
<script src="{{ asset('/assets/admin/js/admin.js')}}"></script>



{{--Scripts--}}
@yield('scripts')
</body>
</html>
