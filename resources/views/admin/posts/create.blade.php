@extends('layouts.admin')
    
@section('content')
    
<!-- Blog Post -->
<div class="my-4">
    
    <div>
        <h2 class="mb-4">Create Post</h2>
        
        <form method="post" action="/admin/posts">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
       
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
        
    </div>

</div> 

@endsection