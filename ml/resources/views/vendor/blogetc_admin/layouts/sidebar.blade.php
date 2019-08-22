

<ul class="list-group mb-3">
    <li class="list-group-item justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.index') }}">Noticias Monerlend</a>
             <span class="text-muted">(<?php
                 $categoryCount = \WebDevEtc\BlogEtc\Models\BlogEtcPost::count();

                 echo $categoryCount . " " . str_plural("Publicaciones", $categoryCount);

                 ?>)</span>
            </h6>
            <small class="text-muted">Resumen de tus publicaciones</small>

            <div class="list-group ">

                <a href='{{ route('blogetc.admin.index') }}'
                   class='list-group-item list-group-item-action @if(\Request::route()->getName() === 'blogetc.admin.index') active @endif  '><i
                            class="fa fa-th fa-fw"
                            aria-hidden="true"></i>
                    Todas las publicaciones</a>
                <a href='{{ route('blogetc.admin.create_post') }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.create_post') active @endif  '><i
                            class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    Agregar publicación</a>
            </div>
        </div>

    </li>


    <li class="list-group-item justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.comments.index') }}">Comentarios</a>

                            <span class="text-muted">(<?php
                                $commentCount = \WebDevEtc\BlogEtc\Models\BlogEtcComment::withoutGlobalScopes()->count();

                                echo $commentCount . " " . str_plural("Comentarios", $commentCount);

                                ?>)</span>
            </h6>
            <small class="text-muted">Administrar Comentarios</small>

            <div class="list-group ">
                <a href='{{ route('blogetc.admin.comments.index') }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.comments.index' && !\Request::get("waiting_for_approval")) active @endif   '><i
                            class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    Todos los comentarios</a>


                <?php $comment_approval_count = \WebDevEtc\BlogEtc\Models\BlogEtcComment::withoutGlobalScopes()->where("approved", false)->count(); ?>

                <a href='{{ route('blogetc.admin.comments.index') }}?waiting_for_approval=true'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.comments.index' && \Request::get("waiting_for_approval")) active @elseif($comment_approval_count>0) list-group-item-warning @endif  '><i
                            class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    {{ $comment_approval_count }}
                    Esperando por aprobación </a>

            </div>
        </div>
    </li>


    <li class="list-group-item  justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.categories.index') }}">Categorias</a>
                    <span class="text-muted">(<?php
                        $postCount = \WebDevEtc\BlogEtc\Models\BlogEtcCategory::count();
                        echo $postCount . " " . str_plural("Categorias", $postCount);
                        ?>)</span>
            </h6>


            <small class="text-muted">Categorias para noticias</small>

            <div class="list-group ">
                <a href='{{ route('blogetc.admin.categories.index') }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.categories.index') active @endif  '><i
                            class="fa fa-object-group fa-fw" aria-hidden="true"></i>
                    Todas las categorias</a>
                <a href='{{ route('blogetc.admin.categories.create_category') }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.categories.create_category') active @endif  '><i
                            class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    Agregar categoria</a>
            </div>
        </div>

    </li>

    @if(config("blogetc.image_upload_enabled"))
    <li class="list-group-item  justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.images.upload') }}">Subir imagenes</a></h6>


            <div class="list-group ">

                <a href='{{ route('blogetc.admin.images.all') }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.images.all') active @endif  '><i
                            class="fa fa-picture-o fa-fw" aria-hidden="true"></i>
                    Ver Todas</a>



                <a href='{{ route('blogetc.admin.images.upload') }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.images.upload') active @endif  '><i
                            class="fa fa-upload fa-fw" aria-hidden="true"></i>
                    Subir</a>


            </div>


        </div>

    </li>
        @endif


</ul>