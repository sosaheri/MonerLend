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
              <h3 class="login-heading mb-4">Registrate en nuestra comunidad</h3>

                  @if(session()->has('message'))
                    <div class="alert alert-success">
                      {{ session()->get('message') }}
                    </div>
                  @endif

              <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-label-group">
                    <input id="name" style="padding:12px;" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre y Apellido" autofocus>                      
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label style="padding:12px;" for="name" > Nombre y Apellido</label>

                            
                </div>

                <div class="form-label-group">
                    <input id="username" style="padding:12px;" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Nombre de usuario" autofocus>                      
                                
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label style="padding:12px;" for="username" > Nombre de usuario</label>

                            
                </div>

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
                    <select id="country" style=" border-radius: 25px !important;"  class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" placeholder="País de residencia" autofocus>
                            @foreach ($paises as $pais)

                                <option value="{{ $pais->name }}">{{ $pais->name }}</option>

                            @endforeach
                    </select>

                               
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            
                </div>

                <div class="form-label-group">
                  <input type="password" style="padding:12px;" name="password"   id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="new-password">

                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                  <label style="padding:12px;" for="password">Contraseña</label>
                </div>

                <div class="form-label-group">
                  <input type="password" style="padding:12px;" name="password_confirmation"   id="password-confirm" class="form-control" placeholder="Confirma la Contraseña" required autocomplete="new-password">
                             
                  <label style="padding:12px;" for="password-confirm">Confirma la Contraseña</label>
                </div>                
                <div class="form-label-group">
                   <div class="">
                      {!! NoCaptcha::display() !!}
                  </div>
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block text-danger" role="alert">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Registrate</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
