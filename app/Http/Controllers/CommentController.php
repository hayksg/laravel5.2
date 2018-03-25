<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['content' => 'required|min:2']);
        
        /*
        $comment = new Comment;
        $comment->content = request('content');
        $comment->post_id = $post->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        */
        
        /*
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'content' => request('content'),
        ]);
        */
        
        //$post->addComment(auth()->id(), request('content'));
        $post->addComment(
            new Comment(request()->only(['content']))
        );
        
        return back();
    }
}
