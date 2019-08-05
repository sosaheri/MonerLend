@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">¡Bienvenido de vuelta!</h3>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-label-group">
                  <input type="email" style="padding:12px;" id="email" autocomplete="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Eléctronico" required autofocus>
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror               
                  <label style="padding:12px;" for="email">Correo Eléctronico</label>
                </div>

                <div class="form-label-group">
                  <input type="password" style="padding:12px;" name="password"   id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password">


                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                  <label style="padding:12px;" for="password">Contraseña</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label form-check-label" for="remember">Recordar Clave</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Ingresar</button>
                <div class="text-center">

                @if (Route::has('password.request'))
                <a class="small" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif

                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
hey
@endsection
