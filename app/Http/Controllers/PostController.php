<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent;
use Jenssegers\Mongodb\Query\Builder;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);   
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $resultado = Post::find($id);
        return view('posts.postUnico', ['post' => $resultado]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'content' => 'required:max:2200',
        ]);

        $imageName = $request->file('image')->store('posts/'. Auth::id(), 'public');


        $title = $request->get('title');
        $content = $request->get('content');

        $post = $request->user()->post()->create([
            'title' => $title,
            'image' => $imageName,
            'content' => $content,
        ]);

        return redirect()->route('post', ['id' => $post->id]);
    }

    public function userPosts()
    {
        # code...
        $user_id = Auth::id();
        $posts = Post::where('user_id', "=", $user_id)->get();
        return view('posts.myPosts', compact('posts'));
    }

    
    public function today()
    {
        $fecha = Carbon::now();
        $posts = Post::where('created_at', '>', Carbon::now()->startOfDay())->get();
        return view('posts.today', compact('posts'));
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.myPosts');
    }

     public function edit(Post $post)
    {
        return view("posts.edit",compact('post'));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'content' => 'required:max:2200',
        ]);

        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $title = $request->get('title');
        $content = $request->get('content');
        
        $post->title = $title;
        $post->image = 'img/'. $imageName;
        $post->content = $content;
        $post->save();

        $request->image->move(public_path('img'), $imageName);

        return redirect()->route('post', ['id' => $post->id]);
    }
}
