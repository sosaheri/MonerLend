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
                    <div class="col-md-4">
                      <div class="card  card-tasks">
                        <div class="card-header ">
                          
                          <h4 class="card-title">Información de mi cuenta</h4>
                        </div>
                        <div class="card-body ">
                        <div class="panel panel-bordered-dark panel-dark">
                            
                                <div class="panel-body bg-gray-dark">
                                <p>Esta es una resumen del estado de tu cuenta.</p>
                                <div class="table-responsive">
                                <table class="table table-condensed">
                                <tbody>
                                <tr>
                                <td><strong>Ahorros disponibles</strong></td>
                                <td><span class="badge badge-primary"> {{ Monerlend::saldoActual( Auth::id() ) }}  </span></td>
                                </tr>
                                <tr>
                                <td><strong>Limite de Prestamos*</strong></td>
                                <td><span class="badge badge-primary">0</span></td>
                                </tr>
                                <tr>
                                
                                </tr>
                                </tbody>
                                </table>
                                </div>
                                <p>El cupo máximo de crédito, será el mismo valor depositado en ahorro..</p>
                                <p>Los Préstamos se procesarán en un lapso de 24 horas luego de la solicitud.</p>
                                </div>
                                </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card card-user">
                        <div class="container"> 
                          <form action="{{ url('/prestamos') }}" method="post"> 
                              <div class="form-group"> 
                                  <label for="email">Correo Electronico:</label> 
                                  <input type="email" class="form-control"
                                        id="email" placeholder="Correo Electronico"
                                        name="email" disabled="disabled" value=" {{ Auth::user()->email }}"> 
                              </div> 
                                
                              <div class="form-group"> 
                                  <label for="lname">Usuario:</label> 
                                  <input type="text" class="form-control" id="lname"
                                      placeholder="Usuario" name="lname" disabled="disabled" value=" {{ Auth::user()->username }}"> 
                              </div> 

                  

                              <div class=""> 
                                  <label for="amount">Monto:</label> 


                              </div>  

                                  <div class="rangeslider-wrap">
                                    <input name="amount" type="range" min="1" max="{{ Monerlend::saldoActual( Auth::id() ) }}" step="1" labels="1, {{ Monerlend::saldoActual( Auth::id() ) }}">
                                  </div>
                                  





                                
                              {{ csrf_field() }}
                              <button type="submit" class="btn bg-success"> 
                                  Solicitar Prestamo  
                              </button> 
                          </form> 

                     </div> 
                          
                        </div>
                    </div>
                    
          </div>

          <div class="row">
          <div class="col-md">
                        <div class="card">
                            <div class="container"> 
                              <form action="{{ url('/financiamiento') }}" method="post"> 
                                  <div class="form-group"> 
                                      <label for="sol">Correo Electronico:</label> 
                                      <input type="text" class="form-control"
                                            id="sol" placeholder="algo"
                                            name="sol"  value=" {{ Auth::user()->email }}"> 
                                  </div> 
                                    
                                





                                    
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn bg-success"> 
                                      Solictar Finaciamiento  
                                  </button> 
                              </form> 

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
