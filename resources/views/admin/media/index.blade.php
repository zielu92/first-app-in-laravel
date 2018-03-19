@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if($photos)
    <table class="table table-striped">
        <thead>
          <tr>
              <th>id</th>
              <th>Name</th>
              <th>Created</th>
              <th>Belongs</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
          <tr>
              <td>{{$photo->id}}</td>
              <td><img height="60" src="{{($photo->file) ? $photo->file :
              'http://placehold.it/60?text=no image'}}"></td>
              <td>{{$photo->created_at ? $photo->created_at : 'none'}}</td>
              <td>{{$photo->photoSource()}}</td>
              <td>    {!! Form::model($photo, ['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                  <div class="form-grop">
                      {!! Form::submit('Delete photo', ['class'=>'btn btn-alert']) !!}
                  </div>

                  {!! Form::close() !!}
              </td>
          </tr>
         @endforeach
        </tbody>
     </table>
    @endif
@endsection