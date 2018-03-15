@extends('layouts.admin')


@section('content')
<div class="row">
    <h1>Edit User</h1>
    @if($user->photo)
        <div class="col-sm-3">

            <img src="{{$user->photo->file}}" alt="" class="img-responsive img-rounded">

        </div>
    @endif
    <div class="col-md-9">
        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', [1 => 'Active', 0 => 'Not active'], null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', ['' => 'choice option'] + $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'file:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Edit user', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>

</div>

<div class="row">
     @include('includes.formError')
</div>


@endsection