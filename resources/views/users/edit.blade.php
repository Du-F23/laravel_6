@extends('Layout/app')
@section('content')

@if (session('mesageUpdate'))
<div class="alert alert-info alert-dismissible text-white" role="alert">
  <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>. {{ session('mesageUpdate')
    }}.</span>
  <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Editar Usuario</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <div class="container">
                <form action="{{route('user.update', ['id'=>$users->id])}}" method="POST">
                    {{-- generar el token para el envio de dato csrf --}}
                    @csrf
                    @method('PUT')
                    <label class="col" for="">Nombre Usuario:</label>
                    <br>
                    <input id= "name" class="col-12 inputborder" type="text" name="name" value="{{$users->name}}">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
