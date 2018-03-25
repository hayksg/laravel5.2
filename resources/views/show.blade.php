@extends('layouts.master')
    
@section('content')

<div class="card mb-4">
    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ $post->content }}</p>
        <a href="/" class="btn btn-primary">&larr; Back</a>
    </div>
    <div class="card-footer text-muted">
        Posted on <small><strong>{{ $post->created_at->toFormattedDateString() }}</strong> by <strong>{{ $post->user->name }}</strong></small>
    </div>
</div>
<br>


<ul class="list-group mb-3">
    @foreach($post->comments as $comment)
    <li class="list-group-item mb-2">
        <div><strong>{{ $post->user->name }}</strong> ( <small>{{ $comment->created_at->diffForHumans() }}</small> )</div>
        {{ $comment->content }}
    </li>
    @endforeach
</ul>


<form method="post" action="/posts/{{ $post->id }}/comments">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="content"><h4>Add comment:</h4></label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Send</button>
    </div>
</form>

<br>
<br>

@endsection

