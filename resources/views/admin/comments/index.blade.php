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
                  <td><a href="{{ route('home.post', $comment->post->id) }}"> {{$comment->post->title}} </a><br>
                  <a href="{{route('admin.comments.replies.show', $comment->id)}}">Check replies</a></td>
                  <td>

                          {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',
                          $comment->id]]) !!}
                      @if($comment->is_active == 1)
                          <input type="hidden" name="is_active" value="0">
                      @else
                          <input type="hidden" name="is_active" value="1">
                      @endif
                          <div class="form-grop">
                              @if($comment->is_active == 0)
                                  {!! Form::submit('Accept', ['class'=>'btn btn-primary']) !!}
                              @else
                                  {!! Form::submit('Cancel displaying', ['class'=>'btn btn-info']) !!}
                              @endif
                          </div>

                          {!! Form::close() !!}



                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',
                        $comment->id]]) !!}

                            <div class="form-grop">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>

                        {!! Form::close() !!}


                  </td>
              </tr>
          @endforeach
        @endif
        </tbody>
     </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$comments->render()}}

        </div>
    </div>
@endsection