@forelse($comments as $comment)



    <div class="card bg-light mb-3">
        <div class="card-header">
            {{$comment->author()}}

            @if(config("blogetc.comments.ask_for_author_website") && $comment->author_website)
                (<a href='{{$comment->author_website}}' target='_blank' rel='noopener'>website</a>)
            @endif

            <span class="float-right" title='{{$comment->created_at}}'><small>{{$comment->created_at->diffForHumans()}}</small></span>
        </div>
        <div class="card-body bg-white">
            <p class="card-text">{!! nl2br(e($comment->comment))!!}</p>
        </div>
    </div>





@empty
    <div class='alert alert-info'>No hay comentarios¿Quieres agregar el primero?</div>
@endforelse

@if(count($comments)> config("blogetc.comments.max_num_of_comments_to_show",500) - 1)
    <p><em>Solo se muestran los primeros {{config("blogetc.comments.max_num_of_comments_to_show",500)}} comentarios.</em>
    </p>
@endif

