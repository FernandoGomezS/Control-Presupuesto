@extends('layouts.auth')


@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content"> 
                <form role="form" method="POST" action="{{ url('/password/email') }}">
                         {!! csrf_field() !!}                   
                        <h1>Restablecer </h1>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   placeholder="Correo" required autofocus>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (!$errors->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                {!! $errors->first() !!}
                            </div>
                        @endif

                        <div>
                            <button class="btn btn-default submit" type="submit">Enviar enlace</button>
                            <a class="reset_pass" href="{{ route('login') }}">
                                Volver a iniciar sesión
                            </a>
                        </div>

                        <div class="clearfix"></div>

                         <div class="separator">                

                <div class="clearfix"></div>
                <br>

                <div>
                  <h1><i class="fa fa-archive"></i> Control de presupuesto</h1>                  
              </div>
          </div>   
                   </form>
                </section>
            </div>
        </div>
    </div>
@endsection

