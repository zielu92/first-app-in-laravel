@include('includes.front-header')
<!-- Navigation -->
@include('includes.home_nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
        @yield('content')
        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('includes.home_sidebar')

    </div>
    <hr>
    <!-- Footer -->
@include('includes.front_footer')