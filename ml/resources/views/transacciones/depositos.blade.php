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
              @if(session()->has('ahorro'))
              <div class="alert alert-success">
                {{ session()->get('ahorro') }}
              </div>
              @endif

              @if(session()->has('ahorroE'))
              <div class="alert alert-danger">
                {{ session()->get('ahorroE') }}
              </div>
              @endif

              @if(session()->has('ahorroE2'))
              <div class="alert alert-danger">
                {{ session()->get('ahorroE2') }}
              </div>
              @endif
          </div>

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
                                <td><strong>Balance</strong></td>
                                <td><span class="badge badge-primary"> {{ Monerlend::saldoActual( Auth::id() )}}  </span></td>
                                </tr>
                                <tr>
                                    <td><strong>Ahorro</strong></td>
                                    <td><span class="badge badge-primary"> {{ Monerlend::ahorroActual( Auth::id() ) }}  </span></td>
                                    </tr>
                                <tr>
                                <td><strong>En Prestamo</strong></td>
                                <td><span class="badge badge-primary"> {{ Monerlend::prestamoActual( Auth::id() ) }} </span></td>
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
                        <div class="card">
                        <div class="card-header ">
                          
                          <h4 class="card-title">Abona saldo a tu cuenta</h4>
                        </div>

                        <div class="card-body">
                            <div class="container"> 
                                <form action="{{ url('/depositos') }}" method="post"> 
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

                                    <!-- <select id="operacion" style=" border-radius: 25px !important;"  class="form-control"
                                    name="operacion" value="" placeholder="Operacion a realizar">

                                      <option value="ahorro">Ahorro</option>
                                      <option value="pago">Pago</option>

                                                  
                                    </select>   -->

                                    <div class="form-group"> 
                                        <label for="monto">Monto:</label> 
                                        <input type="text" class="form-control" id="monto" 
                                            placeholder="Monto" name="monto"> 
                                    </div>  
                                      
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn bg-success"> 
                                        Depositar con Coingate
                                    </button> 
                                </form> 

                            </div> 
                        </div>
                          

                        </div>
                    </div>
                    
          </div>

          <div class="row">

            
            <div class="col-md-3">
                  <div class="card  card-tasks">
                    <div class="card-header ">
                      
                      <h4 class="card-title">Iniciar plan de ahorro</h4>
                    </div>
                    <div class="card-body ">
                    <div class="panel panel-bordered-dark panel-dark">
                        <form action="{{ url('/aprobarAhorrar') }}" method="post">
                                  <div class="panel-body bg-gray-dark">
                                  <p>Planifica tu futuro ahorrando.</p>
                                  <div class="table-responsive">
                                  
                                      <div class="form-group"> 
                                          <label for="amount">Monto:</label> 
                                          <div class="rangeslider-wrap">
                                              <input name="amount" type="range" min="0" max="{{ Monerlend::saldoActual( Auth::id() ) }}" step="10" labels="1, {{ Monerlend::saldoActual( Auth::id() ) }}">
                                        </div>
                                      </div>  
        
                                      



                                      <div class="form-group"> 
                                          <label for="month">Meses de deposito:</label> 
                                          <div class="rangeslider-wrap">
                                              <input name="month" type="range" min="1" max="36" step="1" labels="1, 36">
                                        </div> 
                                      </div>
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn bg-success"> 
                                          Depositar 
                                      </button> 
    
    
                        </form>
                                  </div>
                                  <p>Selecciona la cantidad de dinero de tu balance a colocar en Ahorro y selecciona la cantidad de meses del deposito.</p>
                                  <p>Podras realizar abonos sobre tus ahorros cada 10 días.</p>
                                  <p>Por los ahorros recibiras una rentabilidad anual del 10% con pagos mensuales.</p>
                                  <p>Podras retirar tus fondos y rentabilidad una vez transcurrido 30 días calendario luego de iniciado el plan de ahorro.</p>
                                  </div>
                                  </div>


                    </div>
                    <div class="card-footer ">
                      <hr>
                      
                    </div>
                  </div>
            </div>
                
            <div class="col-md-3">
                  <div class="card  card-tasks">
                    <div class="card-header ">
                      
                      <h4 class="card-title">Pagar cuota de ahorro</h4>
                    </div>
                    <div class="card-body ">
                    <div class="panel panel-bordered-dark panel-dark">
                        
                            <div class="panel-body bg-gray-dark">
                            <p>Realiza el pago de tu cuota mensual.</p>
                            <div class="table-responsive">
                            <table class="table table-condensed">
                            <tbody>
                            <tr>
                            <td><strong>Balance</strong></td>
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

            <div class="col-md-3">
              <div class="card  card-tasks">
                <div class="card-header ">
                  
                  <h4 class="card-title">Financiar a un amigo</h4>
                </div>
                <div class="card-body ">
                <div class="panel panel-bordered-dark panel-dark">
                    
                        <div class="panel-body bg-gray-dark">
                        <p>Esta es una resumen del estado de tu cuenta.</p>
                        <div class="table-responsive">
                        <table class="table table-condensed">
                        <tbody>
                        <tr>
                        <td><strong>Balance</strong></td>
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

            <div class="col-md-3">
              <div class="card  card-tasks">
                <div class="card-header ">
                  
                  <h4 class="card-title">Pagar prestamo</h4>
                </div>
                <div class="card-body ">
                <div class="panel panel-bordered-dark panel-dark">
                    
                        <div class="panel-body bg-gray-dark">
                        <p>Esta es una resumen del estado de tu cuenta.</p>
                        <div class="table-responsive">
                        <table class="table table-condensed">
                        <tbody>
                        <tr>
                        <td><strong>Balance</strong></td>
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
