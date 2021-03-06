@extends('layouts.admin')


@section('content')

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Uploaded</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
              <td>{{$user->id}}</td>
              <td><img height="60" src="{{($user->photo) ? $user->photo->file :
              'http://placehold.it/60?text=no image'}}"></td>
              <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
              <td>{{$user->email}}</td>
              <td>{{$user->role ? $user->role->name : 'none'}}</td>
              <td>{{$user->is_active == 1 ? 'active' : 'not active'}}
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>

          </tr>
            @endforeach
        @endif
        </tbody>
     </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$users->render()}}

        </div>
    </div>
@endsection