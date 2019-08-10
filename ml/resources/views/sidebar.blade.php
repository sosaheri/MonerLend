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
           
              <li class="">
                <a href="{{ url('/home') }}">
                  <i class="now-ui-icons design_app"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li>
                <a href="{{ url('/profile') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Perfil de usuario</p>
                </a>
              </li> 

              <li>
                <a href="{{ url('/users') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Gestión de Usuarios</p>
                </a>
              </li>
              <li>
                <a href="{{ url('/logout') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Salir</p>
                </a>
              </li>              
            </ul>
          </div>

</div>

