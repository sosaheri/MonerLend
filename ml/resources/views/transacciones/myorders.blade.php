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


<h2>Cart Information</h2>
<table class="table col-6 col-lg-4">
  <thead class="thead-inverse">
    <tr>
      <th>Order Id</th>
      <th>Price</th>
      <th>Status</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>

  @foreach($myOrders as $myOrder)
    <tr>
    <td>{{$myOrder->id}}</td>
    <td>{{$myOrder->total_price}} $</td>
    <td>{{$myOrder->status}}</td>
    <td>{{$myOrder->created_at->diffForHumans()}}</td>
    <td>{{$myOrder->updated_at->diffForHumans()}}</td>
    </tr>

  @endforeach

</tbody>
</table>




        </div>


          <div class="row">
                    <div class="col-md-6">
                      <div class="card  card-tasks">
                        <div class="card-header ">
                          
                          <h4 class="card-title"></h4>
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

                    <div class="col-md-6">
                        <div class="card card-user">
                        <div class="container"> 
        <form action="/depositos" method="post"> 
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
