<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'content' => 'required:max250',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->content = $request->get('content');

        $post = Post::find($request->get('post_id'));
        $user = User::findOrFail($post->user_id);
        $post->comments()->save($comment);

        $user->notify(new CommentNotification($comment, $post));

        return redirect()->route('post', ['id' => $request->get('post_id')]);
    }
}
