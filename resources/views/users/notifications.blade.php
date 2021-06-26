@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Comentario</th>
            <th scope="col">User</th>
            <th scope="col">Post</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notificaciones as $notificacion)
            <tr>
                <th>{{$notificacion -> created_at}}</th>
                <th>{{$notificacion -> data['comment']}}</th>
                <th>{{$notificacion -> data['user']}}</th>
                <th>{{$notificacion -> data['post']}}</th>
            </tr>

        @php
            $notificacion->markAsRead();
        @endphp

        @endforeach
    </tbody>
</table>
@endsection