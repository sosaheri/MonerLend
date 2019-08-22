@extends("blogetc_admin::layouts.admin_layout")
@section("content")




    @forelse($posts as $post)
        <div class="card m-4" style="">
            <div class="card-body">
                <h5 class='card-title'><a href='{{$post->url()}}'>{{$post->title}}</a></h5>
                <h5 class='card-subtitle mb-2 text-muted'>{{$post->subtitle}}</h5>
                <p class="card-text">{{$post->html}}</p>

                <?=$post->image_tag("thumbnail", false, "float-right");?>

                <dl class="">
                    <dt class="">Autor</dt>
                    <dd class="">{{$post->author_string()}}</dd>
                    <dt class="">Publicado el</dt>
                    <dd class="">{{$post->posted_at}}</dd>


                    <dt class="">¿Esta publicado?</dt>
                    <dd class="">

                        {!!($post->is_published ? "Si" : '<span class="border border-danger rounded p-1">No</span>')!!}

                    </dd>

                    <dt class="">Categorias</dt>
                    <dd class="">
                        @if(count($post->categories))
                            @foreach($post->categories as $category)
                                <a class='btn btn-outline-secondary btn-sm m-1' href='{{$category->edit_url()}}'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                    {{$category->category_name}}
                                </a>
                            @endforeach
                        @else No Hay Categorias
                        @endif

                    </dd>
                </dl>


                @if($post->use_view_file)
                    <h5>Usar Vista de Archivos Personalizada:</h5>
                    <div class="m-2 p-1">
                        <strong>Ver Archivos:</strong><br>
                        <code>{{$post->use_view_file}}</code>

                        <?php

                        $viewfile = resource_path("views/custom_blog_posts/" . $post->use_view_file . ".blade.php");


                        ?>
                        <br>
                        <strong>Nombre de archivo:</strong>
                        <br>
                        <small>
                            <code>{{$viewfile}}</code>
                        </small>

                        @if(!file_exists($viewfile))
                            <div class='alert alert-danger'>¡Atención! El archivo personalizado no existe. Cree el archivo para esta publicación para que se visualice correctamente.
                            </div>
                        @endif

                    </div>
                @endif


                <a href="{{$post->url()}}" class="card-link btn btn-outline-secondary"><i class="fa fa-file-text-o"
                                                                                          aria-hidden="true"></i>
                    Ver Publicación</a>
                <a href="{{$post->edit_url()}}" class="card-link btn btn-primary">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Editar Publicación</a>
                <form onsubmit="return confirm('Are you sure you want to delete this blog post?\n You cannot undo this action!');"
                      method='post' action='{{route("blogetc.admin.destroy_post", $post->id)}}' class='float-right'>
                    @csrf
                    <input name="_method" type="hidden" value="DELETE"/>
                    <button type='submit' class='btn btn-danger btn-sm'>
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        Borrar
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class='alert alert-warning'>No hay publicaciones que mostrar. ¿Por que no agregas una?</div>
    @endforelse



    <div class='text-center'>
        {{$posts->appends( [] )->links()}}
    </div>


@endsection