@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Fecha de Publicacion</th>
            <th scope="col">Opciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th>{{$post -> id}}</th>
                <th><a href="{{url('/posts/'.$post->id)}}">{{$post -> title}}</a></th>
                <th>{{$post -> created_at->toFormattedDateString()}}</th>
                @auth
                    <th><a href="{{url('/posts/'.$post->id.'/delete')}}">Eliminar</a>
<a href="">Editar</a></th>
                @endauth
            </tr>
            
            @endforeach
        </tbody>
    </table>
@endsection