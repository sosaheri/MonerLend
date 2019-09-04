@extends("layouts.app",['title'=>$title])

@section("content")

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

    {{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

    <div class='row'>
        <div class='col-sm-12 blogetc_container'>
            @if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
                <div class="text-center">
                        <p class='mb-1'>Estas logueado como un administrador.
                            <br>

                            <a href='{{route("blogetc.admin.index")}}'
                               class='btn border  btn-outline-primary btn-sm '>

                                <i class="fa fa-cogs" aria-hidden="true"></i>

                                Regresar al Administrador</a>


                        </p>
                </div>
            @endif


            @if(isset($blogetc_category) && $blogetc_category)
                <h2 class='text-center'>Viewing Category: {{$blogetc_category->category_name}}</h2>

                @if($blogetc_category->category_description)
                    <p class='text-center'>{{$blogetc_category->category_description}}</p>
                @endif

            @endif


            @forelse($posts as $post)
                @include("blogetc::partials.index_loop")
            @empty
                <div class='alert alert-danger'>No hay publicaciones</div>
            @endforelse

            <div class='text-center  col-sm-4 mx-auto'>
                {{$posts->appends( [] )->links()}}
            </div>




                @include("blogetc::sitewide.search_form")

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