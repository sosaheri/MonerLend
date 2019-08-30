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
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Usuarios Solicitando Financiamiento ( {{ count($financiamientos) }} )</h5>
              </div>

              <div class="card-columns pr-3 pl-3 pb-3 ph-3">
              
              @foreach ($financiamientos as $financiamiento)
                        <div class="card ">
                        
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <img src="{{ asset('uploads/avatars/'.$financiamiento->avatar)  }}" alt="user" class="profile-photo-lg">
                                    </div>

                                    <div class="col-md-7 col-sm-7">
                                      <?php $id = $financiamiento->user_id; ?>
                                        <h5><a href=" {{ url('/financiar', [$id] ) }}" class="profile-link">{{ $financiamiento->name }}</a></h5>
                                        <p>{{ $financiamiento->role}}</p>
                                        <p class="text-muted">{{ $financiamiento->monto }}</p>
                                        <p class="text-muted">{{ $financiamiento->motivo }}</p>
                                        <?php $date = new DateTime($financiamiento->fecha); 
                                        $newdate = $date->format('d-m-Y');
                                        ?>
                                        <p class="text-muted">{{ $newdate }}</p>
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
