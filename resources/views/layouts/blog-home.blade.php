@include('includes.front-header')
<!-- Navigation -->
@include('includes.home_nav')

<!-- Page Content -->
<div class="container">

    @yield('content')
<!-- Blog Sidebar Widgets Column -->
@include('includes.home_sidebar')

</div>
<hr>
<!-- Footer -->
@include('includes.front_footer')