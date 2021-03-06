@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center h-100">
        <div class="card col-md-8 mx-auto">
            @auth
                The user is authenticated...
            @endauth
        </div>
        
    </div>
        
    @foreach ($posts as $post)
    <div class="row align-items-center h-100">
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{url('/posts/'.$post->id)}}">
                            {{$post -> title}}
                    </a>
                    
                </h5>
                
            </div>
            <h6 class="card-footer">
                    <small class="text-muted"> {{ $post->created_at}}</small>
            </h6>
        </div>
    </div>
    @endforeach
</div>
@endsection



