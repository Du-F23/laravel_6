@extends('Layout/app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <form method="post" action=" autocomplete="off" class="form-horizontal">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Crear artículo</h4>
                        <!-- <p class="card-category">User information</p> -->
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <label for="title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-7">
                                <div class="form-group bmd-form-group is-filled">
                                    <input class="form-control" name="name" name="title" id="title" type="text" placeholder="Título" required aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="subtitle" class="col-sm-2 col-form-label">Subtítulo</label>
                            <div class="col-sm-7">
                                <div class="form-group bmd-form-group is-filled">
                                    <input class="form-control" name="name" name="subtitle" id="subtitle" type="text" placeholder="Subtítulo" required aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="category_id" class="col-sm-2 col-form-label">Categoría</label>
                            <div class="col-sm-7">
                                <select class="form-group bmd-form-group" name="category_id" id="category_id">
                                    <option selected value="">Selecciona</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{!! $categoria->id !!}">{{ $categoria->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="img_id" class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-7">
                                <select class="form-group bmd-form-group" name="img_id" id="img_id">
                                    <option selected value="">Selecciona</option>
                                    @foreach($imagenes as $imagen)
                                    <option value="{!! $imagen->id !!}">{{ $imagen->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <textarea class="content" id="body" name="body"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4">
            <div class="card-footer ml-auto mr-auto">
                <button type="button" id="btn-guardar" class="btn btn-primary">guardar</button>
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
