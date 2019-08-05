@extends('layouts.app')

@section('content')



<div class="wrapper">
      <div class="sidebar" data-color="orange">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
          <a href="{{ route('register') }}" class="simple-text logo-mini">
              Ml
          </a>

          <a href="{{ route('register') }}" class="simple-text logo-normal">
            Moner Lend
          </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
          <li class="active ">
              <a href="{{ route('home') }}">

                    <i class="now-ui-icons design_app"></i>

                  <p>Dashboard</p>
              </a>
          </li>



          <li>
              <a href="../notifications.html">

                    <i class="now-ui-icons ui-1_bell-53"></i>

                  <p>Notificaciones</p>
              </a>
          </li>

          <li>
              <a href="../user.html">

                    <i class="now-ui-icons users_single-02"></i>

                  <p>Usuarios</p>
              </a>
          </li>

                     @guest
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                      </form>
                     @else
                        <li>
                          <a  href="{{ route('users.index') }}">
                            <i class="now-ui-icons arrows-1_minimal-down"></i>  
                          <p>Gestionar Usuarios</p>  
                        
                          </a>
                        </li>


                        <li>
                          <a  href="{{ route('roles.index') }}">
                            <i class="now-ui-icons arrows-1_minimal-down"></i>  
                          <p>Gestionar Roles</p>  
                        
                          </a>
                        </li>

                         <li>
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                    <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    
                                    
                                         <p>Salir</p>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            </a>
                        </li>

                        @endguest


        </ul>
      </div>
    </div>
  </div>

@endsection
