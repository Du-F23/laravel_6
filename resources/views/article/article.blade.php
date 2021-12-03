@extends('Layout/app')
@section('content')
<div class="container-fluid py-4">
<div class="row">
<div class="col-9">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">Alta De Articulos</h6>
</div>
{{-- star colum article --}}
<div class="row">
<div class="col">
<div class="row">
<div class="col-12">
<label class="form-label" for="">Agrega Titulo Aqui</label>
<input type="text" class="col-12 inputborder" placeholder="Introduce el titulo aqui">
</div>
</div>
<br>
<div class="row">
<div class="col">
    <div class="row">
        <textarea class="content" id="body" name="body"></textarea>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-3">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">Publicar</h6>
</div>
<br>
<div class="container">
<div class="row justify-content-center">
<div class="col">
<button class="btn btn-primary">Solo Guardar</button>
</div>
<div class="col">
<button class="btn btn-primary"> Vista Previa</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid py-4">
<div class="row">
<div class="col-9">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">Configuracion SEO</h6>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-12">
<label>Igresar tu keyword aqui</label>
<br>
<input type="text" class="col-12 inputborder">
</div>
</div>
</div>
</div>
</div>
<div class="col-3">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<h6 class="text-white text-capitalize ps-3">Agrega Categoria</h6>
</div>
<br>
<div class="container">
<div class="row justify-content-center">
<div class="col">
<select name="" id="">
<option value="">Deportes</option>
<option value="">Politica</option>
<option value="">Espectaculos</option>
<option value="">Musica</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

<script>
    // hacemos que el control body sea texto enriquecido
    $('#body').richText();
    $(function(e) {
        // al dar clic en botón guardar, hacemos petición a la API
        $('#btn-guardar').click(function(e) {
            $.ajax({
                type: 'POST',
                url: '{!! url('api/articles') !!}',
                // aquí pasamos los parámetros deseados
                data: {
                    title:$('#title').val()
                    , img:"falta"
                    , subtitle:$('#subtitle').val()
                    , body:$('#body').val()
                    , category_id:$('#category_id').val()
                    , img_id:$('#img_id').val()
                },
                success: function(data) {
                    if (data.estatus) {
                        alert('Artículo creado');
                    } else {
                        alert('Error al crear artículo');
                    }
                },
                dataType: 'json'
            });
        });
    });
</script>
@endsection
