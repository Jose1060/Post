<?php

namespace App\Http\Controllers;

use App\Http\Requests\userFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function destroy(User $user)
    {   
        $posts = Post::where('user_id', "=", $user->id)->get();
        
        foreach ($posts as $post)
        {
            Post::destroy($post->id);
        }

        User::destroy($user->id);
        return redirect()->route('post.index');
    }

     public function edit(User $user)
    {
        return view("users.edit",compact('user'));
    }

    public function update(userFormRequest $request,User $user)
    {
        $id = $user->id;
        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email' . $id]]);

        $name = $request->get('name');
        $email = $request->get('email');

        $user->name = $name;
        $user->email = $email;
        $user->update();


        return redirect()->route('user.profile', $user);
    }

    public function porfile(User $user)
    {
        return view("users.profile",compact('user'));
    }


    
}
