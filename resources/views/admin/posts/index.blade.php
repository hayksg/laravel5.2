@extends('layouts.admin')
    
@section('content')
    
<!-- Blog Post -->
<div class="my-4">
    
    <div>
        <h2 class="mb-4">Manage Posts</h2>
        <a href="/admin/posts/create" class="btn btn-outline-primary">Create post</a>
        <hr>
        
        @if(! count($posts))
        
        <h5 class="my-4">List is empty</h5>
        
        @else

        <h5 class="my-4">Posts List</h5>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr($post->content, 0, 10) }}....</td>
                    <td>{{ $post->created_at->toFormattedDateString() }}</td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <form action="/admin/posts/{{ $post->id }}" method="post" class="delete-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        
        @endif
    </div>

</div> 

@endsection