

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
                      <div class="card  card-tasks">
                        <div class="card-header ">
                          
                          
                        </div>
                        <div class="card-body ">
                          <div class="table-full-width table-responsive">

                          @include('blogetc::sitewide.recent_posts')


                          </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          
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
                            <?php //\Hashids::encode(auth()->user()->id) ?>
                            {!! Share::page( url('/')."/register/?ref=" . auth()->user()->id , 'Unete a nuestra comunidad y Ahorra en Criptomonedas')
                                ->facebook()
                                ->twitter()
                                ->whatsapp(); !!}
                                
                            </p>

                            <p class="description text-center">Ahorros disponilbes en MonerLend:</p>


</p>

<p class="description text-center">
 
      Tokens MRL disponibles: <label class="badge ">{{ Auth::user()->token_mrl }} </label> <br>
      @if (Auth::user()->getRoleNames()=='["Administrador"]')
            @if( Monerlend::PuedeRetirarMRL(Auth::user()) )

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



<!-- termina contenido -->
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
