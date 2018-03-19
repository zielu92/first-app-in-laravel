@if(Session::has('msg'))
    <div class="alert alert-info">
        {{session('msg')}}
    </div>
@endif