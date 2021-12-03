@extends('Layout/app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Lista De Usuarios</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">    
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Clave</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nombre</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">opiones</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <form action="{{ route('user.destroy', $user) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input 
                        type="submit"
                        value="Eliminar" 
                        class="btn btn-sm btn-danger"
                        onClick="return confirm('estas seguro  a eliminar el registro?')">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>


@endsection
  