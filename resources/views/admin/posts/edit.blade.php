@extends('layouts.admin')
    
@section('content')
    
<!-- Blog Post -->
<div class="my-4">
    
    <div>
        <h2 class="mb-4">Edit Post</h2>
        
        <form method="post" action="/admin/posts/{{ $post->id }}">
            {{ csrf_field() }}
            
            <input type="hidden" name="_method" value="patch">
            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
            </div>
       
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
        
    </div>

</div> 

@endsection