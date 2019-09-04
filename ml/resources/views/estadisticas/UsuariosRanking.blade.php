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
            <a class="navbar-brand" href="{{ url('/home') }}">Dashboard</a>
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
                                  <h5 class="card-category">Mejor rankeado según rol del perfil</h5>
                                  <a href="#">
                                    <h4 class="card-title">Ranking de usuarios</h4>
                                  </a>
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <thead class=" text-primary">
                                          <th>
                                          Usuario      
                                          </th>                                         
                                          <th class="text-right">
                                          Perfil
                                          </th>
                                        </thead>
                                        <tbody>
                                        @foreach ($ranking as $key => $user2)
                                          <tr>
                                            <td>
                                            {{ $user2->name }}
                                            </td>
                                            <td class="text-right">
                                            {{ $user2->role }}
                                            </td>
                                            
                                          </tr>
                                        @endforeach                                        
                                                                                
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
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
