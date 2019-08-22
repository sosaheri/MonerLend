<h5>Categorias de las publicaciones</h5>
<ul class="nav">
    @foreach(\WebDevEtc\BlogEtc\Models\BlogEtcCategory::orderBy("category_name")->limit(200)->get() as $category)
        <li class="nav-item">
            <a class='nav-link' href='{{$category->url()}}'>{{$category->category_name}}</a>
        </li>
    @endforeach
</ul>