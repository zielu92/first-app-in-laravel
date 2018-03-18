@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>
    <div class="row">
        @if($post->photo)
            <div class="col-sm-3">

                <img src="{{$post->photo->file}}" alt="" class="img-responsive img-rounded">

            </div>
        @endif

        <div class="col-md-9">
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', [''=>'Choice category'] + $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-controll']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>

            <div class="form-grop">
                {!! Form::submit('Edit post', ['class'=>'btn btn-primary pull-left']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete post', ['class'=>'btn btn-danger pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('includes.formError')
    </div>
@endsection