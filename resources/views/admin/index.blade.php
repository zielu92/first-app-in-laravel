@extends('layouts.admin')

@section('content')
    <h1>Hello, {{Auth::user()->name}}</h1>
    <p>Today is <b>{{date('d-m-Y')}}</b></p>
@endsection