@extends('admin.dashboard')
@section('admin-content')

    <div id="statistics">
        {{-- {!! $chart->container() !!}
            {!! $chart->script() !!} --}}





        <div class="chart">
            <canvas id="myChart" width="500" height="100"></canvas>
        </div>

        <script>
            // const labels = Utils.months({
            //     count: 7
            // });
            // const data = {
            //     labels: labels,
            //     datasets: [{
            //         axis: 'y',
            //         label: 'My First Dataset',
            //         data: [65, 59, 80, 81, 56, 55, 40],
            //         fill: false,
            //         backgroundColor: [
            //             'rgba(255, 99, 132, 0.2)',
            //             'rgba(255, 159, 64, 0.2)',
            //             'rgba(255, 205, 86, 0.2)',
            //             'rgba(75, 192, 192, 0.2)',
            //             'rgba(54, 162, 235, 0.2)',
            //             'rgba(153, 102, 255, 0.2)',
            //             'rgba(201, 203, 207, 0.2)'
            //         ],
            //         borderColor: [
            //             'rgb(255, 99, 132)',
            //             'rgb(255, 159, 64)',
            //             'rgb(255, 205, 86)',
            //             'rgb(75, 192, 192)',
            //             'rgb(54, 162, 235)',
            //             'rgb(153, 102, 255)',
            //             'rgb(201, 203, 207)'
            //         ],
            //         borderWidth: 1
            //     }]
            // };















            var services = {!! json_encode($services) !!};
            const ctx = document.getElementById('myChart').getContext('2d');
            Chart.defaults.color = '#a385b1';
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(services),
                    datasets: [{
                        label: 'Dienos pajamos',
                        data: Object.values(services),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(255, 9, 132, 0.2)',
                            'rgba(215, 69, 12, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(255, 9, 132, 0.2)',
                            'rgba(215, 69, 12, 0.2)',
                        ],
                        // backgroundColor: 'rgba(130, 61, 130, 0.5)',
                        // borderColor: 'rgba(255, 99, 132, 0.1)',
                        // borderWidth: 3,
                        // color: 'rgba(255, 99, 132, 0,1)'
                        // barThickness: 0.9
                        // barPercentage:0.5
                        maxBarThickness: 30
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: "Šio mėnesio populiariausios paslaugos",
                            font: {
                                size: 20
                            }
                        },
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    //----------------------------------------------------------------
                    indexAxis: 'y',
                    scales: {
                        yAxes: {
                            ticks: {

                                font: {
                                    size: 15
                                },
                                mirror: true,
                                callback: function(cc) { // function to make nbsp before title
                                    return '  ' + this.getLabelForValue(cc);
                                }
                            }
                        },
                        xAxes: {
                            ticks: {
                                stepSize: 1
                            }
                        }

                    }
                }
                //------------------------------
                // options: {
                //     elements: {
                //         bar: {
                //             hoverBackgroundColor: '#964d96',
                //         }
                //     },
                //     plugins: {
                //         //     title:{
                //         //     display:true,
                //         //     text:"Chart"
                //         // },
                //         legend: {
                //             display: false
                //         },
                //         tooltip: {
                //             enabled: true
                //         }
                //     },
                //     scales: {
                //         y: {
                //             ticks: {
                //                 stepSize: 50
                //             },
                //             beginAtZero: true,
                //             // ticks: {
                //             //     callback: function(value) {
                //             //         return '€ ' + value ;
                //             //     }
                //             // }
                //         }
                //     }
                // }
            });
        </script>
    </div>
@endsection
