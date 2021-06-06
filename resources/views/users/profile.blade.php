@extends('layouts.app')

@section('content')
<div class="container-fluid well span6">
	<div class="row-fluid">
        <div class="span2" >
		    <img src="https://i.pinimg.com/736x/8e/13/79/8e13794f1f4b99b56dff895a6b42ef00.jpg" width="200" height="200" class="img-thumbnail">
        </div>
        
        <div class="span8">
            <h3>Nombre: {{$user->name}}</h3>
            <h6>Email: {{$user->email}}</h6>
            <h6><a href="#">More... </a></h6>
        </div>
        
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('user.edit', $user)}}"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="{{route('user.destroy', $user)}}" data-confirm="Esta totalmente seguro de eliminar su cuenta?, recuerde que cuando se elimine su cuenta tambien se eliminarn sus posts"><span class="icon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>
</div>
</div>
@endsection