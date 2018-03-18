@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">

            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-grop">
                    {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

        @if($categories)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : '?'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection