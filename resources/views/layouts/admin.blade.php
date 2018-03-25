@include('layouts.header')
@include('layouts.nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            @yield('content')

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@include('layouts.footer')