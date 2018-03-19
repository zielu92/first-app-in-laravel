@extends('layouts.admin')
@section('content')
    <h1>Comments</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Email</th>
              <th>Comment</th>
              <th>Post</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
              <tr>
                  <td>{{$comment->id}}</td>
                  <td>{{$comment->author}}</td>
                  <td>{{$comment->email}}</td>
                  <td>{{str_limit($comment->body, 10)}}</td>
                  <td><a href="{{ route('home.post', $comment->post->id) }}"> {{$comment->post->title}} </a></td>
                  <td>



                  </td>
              </tr>
          @endforeach
        @endif
        </tbody>
     </table>
@endsection