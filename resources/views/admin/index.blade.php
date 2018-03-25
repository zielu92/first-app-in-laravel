@extends('layouts.admin')

@section('content')
    <h1>Hello, {{Auth::user()->name}}</h1>
    <canvas id="myChart" width="400" height="210"></canvas>
    <hr>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Post", "Categories", "Comments", "Users"],
                datasets: [{
                    data: [{{$postsCount}}, {{$categoriesCount}}, {{$commentsCount}}, {{$usersCount}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ]
                }]
            }
        });
    </script>

@endsection