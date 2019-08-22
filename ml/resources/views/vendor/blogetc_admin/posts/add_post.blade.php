@extends("blogetc_admin::layouts.admin_layout")
@section("content")


    <h5>Añadir Publicación</h5>

    <form method='post' action='{{route("blogetc.admin.store_post")}}'  enctype="multipart/form-data" >

        @csrf
        @include("blogetc_admin::posts.form", ['post' => new \WebDevEtc\BlogEtc\Models\BlogEtcPost()])

        <input type='submit' class='btn btn-primary' value='Añadir nueva publicación' >

    </form>

@endsection