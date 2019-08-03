@extends('layouts.app')

@section('content')


<div class="form-gap"></div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 col-md-offset-4">
            <div style="padding:100px 70px 100px 70px; margin-top:60px;" class="card  panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">¿Olvidaste tu Contraseña?</h2>
                  <p>Puedes reiniciar tu contraseña aquí.</p>
                  <div class="panel-body">

                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
    
                      <div class="form-label-group">
                        
                        <div class="form-label-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input style="padding:12px;" id="email" name="email" placeholder="Correo Eléctronico" class="form-control @error('email') is-invalid @enderror"  type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          

                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                          <label style="padding:12px;" for="email">Correo Elétronico</label>
                        
                        </div>
                      </div>
                      <div class="form-label-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
                        Enviar enlace de reinicio  <br>de contraseña
                                </button>
                    </div>
                      
                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
@endsection
