@extends('layouts.admin')
@section('content')
    <h1>replies</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>reply</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{str_limit($reply->body, 10)}}</td>
                    <td><a href="{{ route('home.post', $reply->comment->id) }}"> {{$reply->comment->title}} </a></td>
                    <td>

                        {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',
                        $reply->id]]) !!}
                        @if($reply->is_active == 1)
                            <input type="hidden" name="is_active" value="0">
                        @else
                            <input type="hidden" name="is_active" value="1">
                        @endif
                        <div class="form-grop">
                            @if($reply->is_active == 0)
                                {!! Form::submit('Accept', ['class'=>'btn btn-primary']) !!}
                            @else
                                {!! Form::submit('Cancel displaying', ['class'=>'btn btn-info']) !!}
                            @endif
                        </div>

                        {!! Form::close() !!}



                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy',
                        $reply->id]]) !!}

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

            {{$replies->render()}}

        </div>
    </div>

@endsection