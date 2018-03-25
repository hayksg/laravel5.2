@extends('layouts.admin')
    
@section('content')
    
<!-- Blog Post -->
<div class=" my-4">
    
    <div>
        <h2>Admin area</h2>
        <p>You have following capabilities:</p>
        <ul class="list-unstyled">
            <li><a href="/admin/posts">Manage posts</a></li>
            <li><a href="/admin/comments">Manage comments</a></li>
            <li><a href="/admin/users">Manage users</a></li>
        </ul>
    </div>

</div> 

@endsection