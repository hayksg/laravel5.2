<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');      
    }
    
    public function index()
    {
        $posts = Post::get();
       
        return view('admin.posts.index', ['posts' => $posts, 'cnt' => 0]);
    }
    
    public function create()
    {
        return view('admin.posts.create');
    }
    
    public function store()
    {
        //dd(request()->only(['title', 'content']));
        //dd(auth()->user()->name);
        //dd(auth()->id());
        //dd(\Auth::user()->name);
        //dd(\Auth::id());
        
        $this->validate(request(), [
            'title'   => 'required',
            'content' => 'required',
        ]);
        
        /*
        $post = new Post;
        $post->user_id = auth()->id();
        $post->title   = request('title');
        $post->content = request('content');
        $post->save();
        */
        
        /*
        Post::create([
            'user_id' => \Auth::id(),
            'title' => request('title'),
            'content' => request('content'),
        ]);
        */
        
        auth()->user()->publish(
            new Post(request()->only(['title', 'content']))
        );
        
        return redirect('/admin/posts');
    }
    
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }
    
    public function update(Post $post)
    {
        $this->validate(request(), [
            'title'   => 'required', 
            'content' => 'required'
        ]);       
        
        /*
        $post->title   = request('title');
        $post->content = request('content');
        $post->save();
        */

        $post->update([
            'title'   => trim(request('title')),
            'content' => trim(request('content')),
        ]);
        
        
        return redirect('/admin/posts');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        
        return back();
    }
}
