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
              @if(session()->has('cuota'))
              <div class="alert alert-success">
                {{ session()->get('cuota') }}
              </div>
              @endif

          </div>

          <div class="row">
                    <div class="col-md-4">
                                <div class=" card  card-tasks">
                                <div class="card-header ">
                                    
                                    <h4 class="card-title">Estado del plan de ahorro</h4>
                                </div>
                                <div class="card-body ">
                                <div class="panel panel-bordered-dark panel-dark">
                                    
                                        <div class="panel-body bg-gray-dark">
                                        
                                        <div class="table-responsive">
                                        <table class="table table-condensed">
                                        <tbody>

                                      @foreach ($cuotas as $cuota)
                                          
                                      
            
                                                <tr>
                                                <td><strong>{{$cuota->cuotas_pagadas }}/{{$cuota->meses }} de {{$cuota->cantidad }} USD  </strong></td>
                                                <td><span class="badge badge-primary">Cuotas pendientes </span></td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Monto de Cuota a pagar  </strong></td>
                                                        <td><span class="badge badge-primary"> {{$cuota->cantidad / $cuota->meses }}</span></td>
                                                        </tr>
                                      @endforeach
                                        
                                        <tr>
                                        
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    
                                </div>
                                </div>
                    </div>

                    <div class="col-md-8">
                            <div class="pagoCuota card  card-tasks">
                              <div class="card-header ">
                                
                                <h4 class="card-title">Pagar cuota de plan de ahorro</h4>
                              </div>
                              <div class="card-body ">
                              <div class="panel panel-bordered-dark panel-dark">
                              
                                            <div class="panel-body bg-gray-dark">
                                            
                                            <div class="table-responsive">
                                            
                                                        <div class="form-group"> 
                                                            <label for="montoDePago">Monto a pagar:</label> 
                                                            <input type="text" class="form-control"
                                                                  id="montoDePago" 
                                                                  name="montoDePago" disabled="disabled" value=" {{ $cuota->cantidad / $cuota->meses }}"> 
                                                        </div> 
                  
                                                        <div class="form-group"> 
                                                                <label for="cuotaDePago">Cuota a pagar:</label> 
                                                                <input type="text" class="form-control"
                                                                      id="cuotaDePago"
                                                                      name="cuotaDePago" disabled="disabled" value=" {{ $cuota->cuotas_pagadas + 1 }}"> 
                                                        </div> 
          
                                                       
          
                                                <div class="form-group"> 
                                                    <p>Este monto sera descontado este monto de su balance</p>
                                                </div>

                                                @php
                                                      $montodePago = $cuota->cantidad / $cuota->meses;
                                                      $cuotadePago = $cuota->cuotas_pagadas + 1;

                                                @endphp


                                                {{ csrf_field() }}
                                                <a href="{{  url("/saldarCuotaApro/{$cuota->id}/{$cuota->meses}/{$montodePago}/{$cuotadePago}") }}"><button type="submit" class="btn bg-success"> 
                                                    Pagar Cuota 
                                                </button> </a>
              
                                              </div>
                                            </div>
                                  </form>
                                            
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
