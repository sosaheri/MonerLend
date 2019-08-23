@extends('layouts.app')


@section('content')

<body class="">

<div class="wrapper ">

@extends('sidebar')

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg panel-header-short">
      </div>

      <div class="content">
<!-- inicia contenido -->


    <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Editar Perfil</h5>
              </div>
              <div class="card-body">

                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <strong>Whoops!</strong> Hay errores con los datos.<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

            
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['profile.update'], 'files' => true ]) !!}
               
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        
                        {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control', 'disabled' => 'disabled')) !!}
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Usuario</label>
                         {!! Form::text('username', null, array('placeholder' => 'Usuario','class' => 'form-control')) !!}
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo Eléctronico</label>
                        {!! Form::text('email', null, array('placeholder' => 'Correo Eléctronico','class' => 'form-control', 'disabled' => 'disabled')) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>País</label>
                         {!! Form::text('country', null, array('placeholder' => 'País','class' => 'form-control', 'disabled' => 'disabled')) !!}
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label> Contraseña</label>
                        
                        {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Confirme Contraseña</label>
                        
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirme Contraseña','class' => 'form-control')) !!}
       
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="">
                        <label>Avatar</label>
                        <br>
                        {{ Form::file('avatar') }}
                      </div>
                    </div> 
                    <div class="col-md-2 pl-1">
                      <div class="form-group right">
                      
                           <button type="submit" class="btn btn-primary">Actualizar</button>
                      
                      </div>
                    </div>                                                            
                  </div>
                
                  {{ Form::close() }}
             
              </div>
            </div>
          </div>
          <div class="col-md-4">
                      <div class="card card-user">
                          <div class="image-dashboard">
                            <img src="{{ asset('img/bgavatar.jpg')  }}" alt="...">
                            
                          </div>
                          <div class="card-body">
                            <div class="author">
                              <a href="{{ url('profile') }}">
                                <img class="avatar border-gray" src="{{ asset('uploads/avatars/'.Auth::user()->avatar)  }}" alt="...">
                                <h5 class="title">{{ Auth::user()->username }}</h5>
                              </a>
                              <p class="description">
                              {{ Auth::user()->name }} <br> Perfil de tipo: 
                              @if(!empty(Auth::user()->getRoleNames()))
                                  @foreach(Auth::user()->getRoleNames() as $v)
                                      <label class="badge ">{{ $v }}</label>
                                  @endforeach
                              @endif
                              </p>
                            </div>
                            <p class="description text-center">
                           

                            Invita a nuevas personas a registrarse<br>

                            {!! Share::page( url('/')."/register/?ref=" . \Hashids::encode(auth()->user()->id) , 'Unete a nuestra comunidad y Ahorra en Criptomonedas')
                                ->facebook()
                                ->twitter()
                                ->whatsapp(); !!}
                           
                            <p class="description text-center">Ahorros disponilbes en MonerLend:</p>


                            </p>
                            
                            <p class="description text-center">
                              <?php $otra = date("Y-m-d");
                                    $fecha_actual = new Datetime("now"); 
                                    $fecha_registro = new Datetime(Auth::user()->mrl_counter);
                                    $intervalo = $fecha_registro->diff($fecha_actual);
                                    $count = $intervalo->m * 30 + $intervalo->d + 1;
                              
                              ?>
                                  Tokens MRL disponibles: <label class="badge ">{{ Auth::user()->token_mrl }}</label> <br> 
                                  @if (Auth::user()->getRoleNames()=='["C"]')
                                        @if( $count >= 90 )
                                        <button type="submit" class="btn btn-primary">Retirar MRL</button>
                                        @else
                                                                                                            
                                        @endif

                                  @endif

                              </p>
                            
                          </div>
                          <hr>

                      </div>
          </div>
    </div>




<!-- Termina contenido -->    
      </div>
     
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed and coded by
            <a href="www.larepaweb.com.ve" target="_blank">Arepa Web Group</a>.
          </div>
        </div>
      </footer>
    </div>
</div>

  


@endsection
