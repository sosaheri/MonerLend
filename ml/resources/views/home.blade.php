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
            <a class="navbar-brand" href="#pablo">Dashboard</a>
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
                                  <h5 class="card-category">Últimas transacciones</h5>
                                  <a href="{{ url('transacciones') }}">
                                    <h4 class="card-title">Historial de Transacciones</h4>
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
                                          Fecha
                                          </th>
                                          <th>
                                          Hora
                                          </th>
                                          <th class="text-right">
                                          Monto
                                          </th>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>
                                              Dakota Rice
                                            </td>
                                            <td>
                                            01/08/2019
                                            </td>
                                            <td>
                                              23:00
                                            </td>
                                            <td class="text-right">
                                              $36,738
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              Minerva Hooper
                                            </td>
                                            <td>
                                            24/08/2019
                                            </td>
                                            <td>
                                              07:00
                                            </td>
                                            <td class="text-right">
                                              $23,789
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              Edgar Arteaga
                                            </td>
                                            <td>
                                            24/08/2019
                                            </td>
                                            <td>
                                              10:00
                                            </td>
                                            <td class="text-right">
                                              $56,142
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              Sage Rodriguez
                                            </td>
                                            <td>
                                              24/08/2019
                                            </td>
                                            <td>
                                              14:33
                                            </td>
                                            <td class="text-right">
                                              $56,142
                                            </td>
                                          </tr>                                         
                                        </tbody>
                                      </table>
                                    </div>
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
                                
                            </p>
                          </div>
                          <hr>

                        </div>
                    </div>
                    
          </div>

          <div class="row">

                    <div class="col-md-6">
                      <div class="card card-chart">
                        <div class="card-header">
                          <h5 class="card-category">Total de Ahorros en la plataforma</h5>
                          <h4 class="card-title">Estadisticas</h4>
                          <div class="dropdown">
                            
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-122px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <a class="dropdown-item text-danger" href="#">Remove Data</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="chart-area"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="lineChartExample" width="329" height="190" class="chartjs-render-monitor" style="display: block; width: 329px; height: 190px;"></canvas>
                          </div>
                        </div>
                        <div class="card-footer">
                          
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card  card-tasks">
                        <div class="card-header ">
                          
                          <h4 class="card-title">Últimas noticias</h4>
                        </div>
                        <div class="card-body ">
                          <div class="table-full-width table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="form-check">
                                     
                                    </div>
                                  </td>
                                  <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                                  <td class="td-actions text-right">
                                   
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">
                                        <span class="form-check-sign"></span>
                                      </label>
                                    </div>
                                  </td>
                                  <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                  <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                      <i class="now-ui-icons ui-2_settings-90"></i>
                                    </button>
                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                      <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-sign"></span>
                                      </label>
                                    </div>
                                  </td>
                                  <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                  </td>
                                  <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                      <i class="now-ui-icons ui-2_settings-90"></i>
                                    </button>
                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                      <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          
                        </div>
                      </div>
                    </div>

                

          </div>

          <div class="row">

                    <div class="card">
                      <div class="card-body">
                          <div class="row">
                          
                            <a href="{{ url('/referral-link') }}"> Referidos</a>
                          
                          
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
