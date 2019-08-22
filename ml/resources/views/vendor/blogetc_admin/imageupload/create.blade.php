@extends("blogetc_admin::layouts.admin_layout")
@section("content")


    <h5>Cargar Imagenes</h5>

    <p>Puede usar esta opción para cargar imagenes.</p>


    <form method='post' action='{{route("blogetc.admin.images.store")}}' enctype="multipart/form-data">

        @csrf


        <div class="form-group mb-4 p-2">

            <label for="upload">Titulo de imagen</label>
            <small id="image_title_help" class="form-text text-muted">Titulo de la imagen</small>
            <input required class="form-control" type="text" name="image_title" id="image_title"
                   aria-describedby="image_title_help">

        </div>


        <div class="form-group mb-4 p-2">

            <label for="upload">Cargar imagen</label>
            <small id="blog_upload_help" class="form-text text-muted">Caragar imagen</small>
            <input required class="form-control" type="file" name="upload" id="upload"
                   aria-describedby="upload_help">

        </div>


        <div class="form-group mb-4 p-2">

            <label >Tamaños para convertir</label>

            <div>
                <input type='checkbox' name='sizes_to_upload[blogetc_full_size]' value='true' checked id='size_blogetc_full_size'>
            <label for='size_blogetc_full_size'>Tamaño completo</label>
                </div>


            @foreach((array)config('blogetc.image_sizes') as $size => $image_size_details)
            <div>
                <input type='checkbox' name='sizes_to_upload[{{$size}}]' value='true' checked id='size_{{$size}}'>
                <label for='size_{{$size}}'>{{$image_size_details['name']}} - {{$image_size_details['w']}} x {{$image_size_details['h']}}px</label>
            </div>
                @endforeach

        </div>
        <div class="form-group mb-4 p-2">
            <label>Guardar</label>

            <input type='submit' class='btn btn-primary' value='Cargar'>

        </div>
    </form>



@endsection