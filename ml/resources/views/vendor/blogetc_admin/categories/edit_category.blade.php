@extends("blogetc_admin::layouts.admin_layout")
@section("content")


    <h5>Editar Categoria</h5>

    <form method='post' action='{{route("blogetc.admin.categories.edit_category",$category->id)}}'  enctype="multipart/form-data" >

        @csrf
        @method("patch")
        @include("blogetc_admin::categories.form", ['category' => $category])

        <input type='submit' class='btn btn-primary' value='Guardar categoria' >

    </form>

@endsection