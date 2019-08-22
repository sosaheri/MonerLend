@extends("layouts.app",['title'=>"Saved comment"])

@section("content")

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

    <div class='text-center'>
        <h3>Gracias su comentario ha sido guardado</h3>

        @if(!config("blogetc.comments.auto_approve_comments",false) )
            <p>Despues de la aprobación de un administrador será publicado!</p>
        @endif

        <a href='{{$blog_post->url()}}' class='btn btn-primary'>Regresar a la noticias</a>
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