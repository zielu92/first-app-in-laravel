@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>User</th>
              <th>Category</th>
              <th>Title</th>
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
              <td>{{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name : 'None'}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
     </table>

@endsection