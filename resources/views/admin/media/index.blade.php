@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if($photos)
        <form action="delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary" value="submit">
                </div>
            </div>

        <table class="table table-striped">
            <thead>
              <tr>
                  <th><input type="checkbox" id="options"></th>
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
                  <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
                  <td>{{$photo->id}}</td>
                  <td><img height="60" src="{{($photo->file) ? $photo->file :
                  'http://placehold.it/60?text=no image'}}"></td>
                  <td>{{$photo->created_at ? $photo->created_at : 'none'}}</td>
                  <td>{{$photo->photoSource()}}</td>
                  <td>

                      <div class="form-grop">
                          <input type="hidden" value="{{$photo->id}}" name="photo">
                          <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                      </div>


                  </td>
              </tr>
             @endforeach
            </tbody>
         </table>
    </form>
    @endif

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$photos->render()}}

        </div>
    </div>

@endsection
@section('footer')
    <script>
        $(document).ready(function() {

            $('#options').click(function(){

               if(this.checked) {

                   $('.checkBoxes').each(function(){

                       this.checked = true;

                   });

               }else {

                   $('.checkBoxes').each(function(){

                       this.checked = false;

                   });

               }

            });

        });
    </script>
@endsection