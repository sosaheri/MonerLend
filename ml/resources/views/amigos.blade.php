@extends('layouts.app')



@section('content')

<body class="monerlend">

<div class="wrapper ">

@include('sidebar')

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
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Mis Amigos ( {{ count($amigos) }} )</h5>
              </div>
              <p class="description text-center">
                           

                            Invita a nuevas personas a registrarse<br>

                            {!! Share::page( url('/')."/register/?ref=" . auth()->user()->id , 'Unete a nuestra comunidad y Ahorra en Criptomonedas')
                                ->facebook()
                                ->twitter()
                                ->whatsapp(); !!}
                           
                            </p>
                            <p class="description text-center">o copia el enlace</p>
                            <p class="description text-center">
                            <input id="copy" value="{{ url('/')."/register/?ref=" . auth()->user()->id }}">

                            <span class="input-group-button">
                            <button class="clipboard" data-clipboard-target="#copy">
                            <i class="monerlend-refer fas fa-copy"></i>
                            </button>
                            </span>




                            </p>
              <div class="card-columns pr-3 pl-3 pb-3 ph-3">
              
              @foreach ($amigos as $amigo)
                        <div class="card ">
                        
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <img src="{{ asset('uploads/avatars/'.$amigo->avatar)  }} " alt="user" class="profile-photo-lg">
                                    </div>

                                    <div class="col-md-7 col-sm-7">
                                        <h5><a href="#" class="profile-link">{{ $amigo->name }}</a></h5>
                                        <p>{{ $amigo->name }}</p>
                                        <p class="text-muted">500m away</p>
                                    </div>

                                    
                                </div>
                        </div>
                        
                        </div>
              @endforeach
              </div>
              

        


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
