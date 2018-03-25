<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::latest()->get();
        //$posts = Post::latest()->paginate(2);
        
        //$posts = Post::latest()->filter(request(['month', 'year']))->paginate(2); // do not works in laravel 5.2
        $posts = Post::latest()->filter(request()->only(['month', 'year']))->paginate(2);
        
        /*
        $posts = Post::latest();
        
        if ($month = request('month')) {
            $posts->whereMonth('created_at', '=', Carbon::parse($month)->month);
        }
        
        if ($year = request('year')) {
            $posts->whereYear('created_at', '=', $year);
        }
        
        $posts = $posts->paginate(2);
        */
        
        
        
        
        
        
        
        
        //$archives = Post::archives(); // pass this to view composer
        
        
        
        
        
        //return view('index', compact('posts', 'archives'));
        return view('index', compact('posts'));
    }
    
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }
}
