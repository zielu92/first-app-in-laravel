@extends('layouts.blog-home')

@section('content')
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
        @if($posts)
            @foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
                <hr>
                <img class="img-responsive" src="{{($post->photo) ? $post->photo->file :
              'http://placehold.it/700?text=no image'}}" alt="">
                <hr>
                    <p>{{str_limit($post->body, 250)}}</p>
                <a class="btn btn-primary" href="{{route('home.post', $post->id)}}">Read More
                    <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Pagination -->
            @endforeach
        @endif
            {!!$posts->render()!!}
        </div>
@endsection
