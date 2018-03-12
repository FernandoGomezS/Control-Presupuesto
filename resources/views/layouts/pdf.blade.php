<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{ ltrim(elixir('assets/admin/css/bootstrap.min.css'), '/') }}" />      
            

        <title> FORMULARIO RR.HH PROGRAMAS {{ $budget_active }} </title>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>