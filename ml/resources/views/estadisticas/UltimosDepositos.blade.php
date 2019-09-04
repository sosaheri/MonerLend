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
                                  <h5 class="card-category">Lista de ultimos depositos de Ahorro</h5>
                                  <a href="#">
                                    <h4 class="card-title">10 Últimos depositos de ahorro </h4>
                                  </a>
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <thead class=" text-primary">
                                          <th>
                                          Usuario      
                                          </th>                                             
                                          <th>
                                          Monto      
                                          </th>   
                                          <th>
                                          Moneda      
                                          </th>                                                                                                                                                                    
                                          <th class="text-right">
                                          Fecha
                                          </th>
                                        </thead>
                                        <tbody>
                                        @foreach ($ultDepositos as $key => $deposito)
                                          <tr>
                                            <td>
                                            {{ $deposito->name }}
                                            </td>
                                            <td>
                                            {{ $deposito->amount }}
                                            </td>       
                                            <td>
                                            {{ $deposito->currency }}
                                            </td>                                                                                                                            
                                            <td class="text-right">
                                            
                                            {{ $deposito->created_at }}
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
