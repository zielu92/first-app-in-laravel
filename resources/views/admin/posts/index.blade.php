@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Title</th>
              <th>User</th>
              <th>Category</th>
              <th>Action</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
          <tr>
              <td>{{$post->id}}</td>
              <td><img height="70" src="{{($post->photo) ? $post->photo->file :
              'http://placehold.it/70?text=no image'}}"></td>
              <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name : 'None'}}</td>
              <td><a href="{{ route('home.post', $post->id) }}">View Post</a><br>
                  <a href="{{ route('admin.comments.show', $post->id) }}">View Comments</a></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
     </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>

@endsection