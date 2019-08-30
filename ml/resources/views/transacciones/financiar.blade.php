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
                    <div class="col-md-6">
                      <div class="card  card-tasks">
                        <div class="card-header ">
                          
                          <h4 class="card-title">Datos del solicitante de financimiento</h4>
                        </div>
                        <div class="card-body ">
                          <div class="table-full-width table-responsive">
                          @foreach ($userFinanciar as $user)

                                    <div class="col-md-4 col-sm-4 text-center">
                                        <img src="{{ asset('uploads/avatars/'.$user->avatar)  }}" alt="user" class="profile-photo-lg">
                                    </div>
                                    <strong>Nombre</strong> <span>{{ $user->name}}</span><br>
                                    <strong>Rango</strong> <span>{{ $user->role}}</span> <br>
                                    <strong>Monto a financiar</strong> <span>{{ $user->monto}}</span> <br>
                                    <strong>Motivo</strong> <span>{{ $user->motivo}}</span> <br>

                                    <?php $date = new DateTime($user->fecha); 
                                    $newdate = $date->format('d-m-Y');
                                    ?>
                                    <strong>Fecha de solicitud</strong> <span>{{ $newdate }}</span>  
                                
                                   
                                    
                          @endforeach
                          </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-header ">
                          
                          <h4 class="card-title">Financiar al usuario</h4>
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

                                    <select id="operacion" style=" border-radius: 25px !important;"  class="form-control"
                                    name="operacion" value="" placeholder="Operacion a realizar">

                                      <option value="ahorro">Ahorro</option>
                                      <option value="pago">Pago</option>

                                                  
                                    </select>  

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
