
@extends('Layout/app')
@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                <th>Clave</th>
                <th>nombre</th>
                <th>Opciones</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>
                        <button type='button' class="btn btn-primary"><i class="far fa-eye"></i></button>
                        <button type='button' class="btn btn-success"><i class="fas fa-pen-square"></i></button>
                        <button type='submit' class="btn btn-danger"
                        onClick="return confirm('estas seguro  a eliminar el registro?')"><i class="far fa-trash-alt"></i></button>
                       {{--  <input 
                          type="submit"
                          value="Eliminar" 
                          class="btn btn-sm btn-danger"
                          onClick="return confirm('estas seguro  a eliminar el registro?')">
                           --}}
                  </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div> 
@endsection
