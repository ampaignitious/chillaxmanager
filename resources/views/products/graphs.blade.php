@extends('navbar_registerd_users')
@section('content')
<div class="container">
    <canvas id="myChart"></canvas>
</div>  
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'products with date',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'yellow',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'yellow',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            title: {
            display: true,
            text: 'the bar graph showing product with category',
            fontSize: 18,
            fontFamily: 'Arial',
            fontColor: '#666',
            fontStyle: 'bold',
            padding: 20
            },

            scales: {
                //this can be used to add labels to the graphs axes
            //     xAxes: [{
            //     scaleLabel: {
            //         display: true,
            //         labelString: 'My X-Axis',
            //         fontSize: 18,
            //         xAxes: [{ticks: {min: 40, max:160}}],
            //         fontFamily: 'Arial',
            //         fontColor: '#666',
            //         fontStyle: 'bold',
            //         padding: 20
            //     }
            // }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
  </script>
@endsection