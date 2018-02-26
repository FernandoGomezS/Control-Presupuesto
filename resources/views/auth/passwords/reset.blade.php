@extends('layouts.auth')

@section('content')
 <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">     
                    <form role="form" method="POST" action="{{ url('/password/reset') }}">
                {!! csrf_field() !!}               
                    <h1>Restablecer </h1>

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Correo" required autofocus>
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Contraseña" required>
                    </div>

                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder=" Confirmar contraseña" required>
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
                        <button class="btn btn-default submit" type="submit">Restablecer contraseña</button>
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