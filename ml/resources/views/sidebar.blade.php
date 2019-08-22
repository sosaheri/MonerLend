<div class="sidebar" data-color="orange">
          <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
          <div class="logo">
            <a href="{{ url('/home') }}" class="simple-text logo-mini">
              ML
            </a>
            <a href="{{ url('/home') }}" class="simple-text logo-normal">
              MonerLend
            </a>
          </div>

          <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
           
              <li class=" @if(\Request::route()->getName() === 'home') active @endif ">
                <a href="{{ url('/home') }}">
                  <i class="now-ui-icons design_app"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class=" @if(\Request::route()->getName() === 'profile.show') active @endif ">
                <a href="{{ url('/profile') }}">
                  <i class="now-ui-icons loader_gear"></i>
                  <p>Perfil de usuario</p>
                </a>
              </li> 

              <li class=" @if(\Request::route()->getName() === 'depositos') active @endif ">
                  <a class="nav-link collapsed" data-toggle="collapse" href="#transacciones" aria-expanded="false">
                      <i class="now-ui-icons business_money-coins"></i>
                      <p>Transacciones
                          <b class="caret"></b>
                        </p>
                  </a>

                  <div class="collapse" id="transacciones" style="">

                    <ul class="nav">

                    <li class=" @if(\Request::route()->getName() === 'transacciones.depositos') active @endif ">
                                <a href="{{ url('/depositos') }}">
                                  <i class="now-ui-icons shopping_credit-card"></i>
                                  <p>Depositos</p>
                                </a>
                            </li>



                    </ul>
                  </div>
              </li>

              <li class=" @if(\Request::route()->getName() === 'noticias') active @endif ">
               @role('Administrador') 
                <a href="{{ url('/noticias_admin') }}" >
                
               @else
               <a href="{{ url('/noticias') }}" >
               @endrole 
                  <i class="now-ui-icons files_single-copy-04"></i>
                  <p>Noticias</p>
                </a>
              </li>

              @role('Administrador')
              <li class=" @if(\Request::route()->getName() === 'users.index') active @endif ">
                <a href="{{ url('/users') }}" >
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Gestión de Usuarios</p>
                </a>
              </li>
              <!-- . -->
              <li>
                      <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
                      <i class="now-ui-icons business_chart-bar-32"></i>
                      <p>Estadisticas
                          <b class="caret"></b>
                        </p>
                      </a>

                      <div class="collapse" id="laravelExample" style="">

                        <ul class="nav">

                        <li class=" @if(\Request::route()->getName() === 'estadisticasRegistrados') active @endif ">
                                    <a href="{{ url('/estadisticasRegistrados') }}">
                                      <i class="now-ui-icons gestures_tap-01"></i>
                                      <p>Estadisticas registrados</p>
                                    </a>
                                </li>

                                <li class=" @if(\Request::route()->getName() === 'estadisticasRanking') active @endif ">
                                  <a href="{{ url('/estadisticasRanking') }}">
                                    <i class="now-ui-icons objects_diamond"></i>
                                    <p>Estadisticas ranking</p>
                                  </a>
                                </li> 

                        </ul>
                      </div>
                    </li>

              @endrole
              <!-- . -->
              <li>
                <a href="{{ url('/logout') }}">
                  <i class="now-ui-icons media-1_button-power"></i>
                  <p>Salir</p>
                </a>
              </li>              
            </ul>
          </div>

</div>

