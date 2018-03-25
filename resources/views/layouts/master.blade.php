@include('layouts.header')
@include('layouts.nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Page Heading
                <small>Secondary Text</small>
            </h1>

            @yield('content')

        </div>
        
        @include('layouts.sidebar')

    </div>
    <!-- /.row -->

</div>

<!-- /.container -->

@include('layouts.footer')