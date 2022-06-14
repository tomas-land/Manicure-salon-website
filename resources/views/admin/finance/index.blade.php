@extends('admin.dashboard')
@section('admin-content')
    <div id="finance">
        {{-- {!! $chart->container() !!}
            {!! $chart->script() !!} --}}
        <div class="chart">
            <canvas id="myChart" width="800" height="200"></canvas>
        </div>
        <script>
            var currentMonthVisits = {!! json_encode($summedUpPrices) !!};
            const ctx = document.getElementById('myChart').getContext('2d');
            Chart.defaults.color = '#a385b1';
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(currentMonthVisits),
                    datasets: [{
                        label: 'Dienos pajamos',
                        data: Object.values(currentMonthVisits),
                        // backgroundColor: 'rgba(130, 61, 130, 0.5)',
                        // borderColor: 'rgba(255, 99, 132, 0.1)',
                        // borderWidth: 3,
                        // color: 'rgba(255, 99, 132, 0,1)'
                        // barThickness: 0.9
                        // barPercentage:0.5
                        maxBarThickness: 30
                    }]
                },
                //------------------------------
                options: {
                    elements: {
                        bar: {
                            hoverBackgroundColor: '#964d96',
                        }
                    },
                    plugins: {
                        //     title:{
                        //     display:true,
                        //     text:"Chart"
                        // },
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                stepSize: 50
                            },
                            beginAtZero: true,
                            // ticks: {
                            //     callback: function(value) {
                            //         return '€ ' + value ;        // add euro sign to y axis ticks
                            //     }
                            // }
                        }
                    }
                }
            });
        </script>

        <div class="card">
            <table>
                <tr>
                    <th>Metai</th>
                    <th>Menesis</th>
                    <th>Pajamos</th>
                </tr>
                <tr>
                    <td>{{ \Carbon\Carbon::now()->format('Y') }}</td>
                    <td>{{ ucwords(\Carbon\Carbon::now()->translatedFormat('F')) }}</td>
                    <td>{{ $currentMonthTotal }}</td>
                </tr>
                <tr>
                    <td>{{ \Carbon\Carbon::now()->format('Y') }}</td>
                    <td>{{ ucwords(
                        \Carbon\Carbon::now()->subMonth()->translatedFormat('F'),
                    ) }}
                    </td>
                    <td>{{ $monthBeforeTotal }}</td>
                </tr>
                <tr>
                    <td>{{ \Carbon\Carbon::now()->format('Y') }}</td>
                    <td>{{ ucwords(
                        \Carbon\Carbon::now()->subMonth('2')->translatedFormat('F'),
                    ) }}
                    </td>
                    <td>{{ $twoMonthsBeforeTotal }}</td>

                </tr>

            </table>
        </div>
    </div>
@endsection
