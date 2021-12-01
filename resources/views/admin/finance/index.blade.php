@extends('admin.dashboard')
@section('admin-content')

    <div id="finance">

        {{-- {!! $chart->container() !!}
            {!! $chart->script() !!} --}}
        <div class="chart">
            <canvas id="myChart" width="800" height="200"></canvas>
        </div>
        <script>
            var visits = {!! json_encode($array2) !!};

            const ctx = document.getElementById('myChart').getContext('2d');
            // let minDataValue = Math.min(mostNegativeValue, options.suggestedMin);
            // let maxDataValue = Math.max(mostPositiveValue, options.suggestedMax);
            // Chart.defaults.global.defaultColor = 'rgba(55, 199, 132)';
            // Chart.defaults.global.defaultFontSize = 15;
            // Chart.defaults.global.defaultFontColor = '#a95da9';
            Chart.defaults.color = '#a385b1';
            const myChart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels: Object.keys(visits),
                    datasets: [{
                        label: 'Dienos pajamos',
                        data: Object.values(visits),
                        // backgroundColor: 'rgba(130, 61, 130, 0.5)',
                        // borderColor: 'rgba(255, 99, 132, 0.1)',
                        // borderWidth: 3,
                        // color: 'rgba(255, 99, 132, 0,1)'

                    }]
                },
                //------------------------------
                options: {
                    elements: {
                        bar: {

                            // backgroundColor:'green'
                            barPercentage: 0.1,
                            hoverBackgroundColor: '#964d96'
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
                            //         return '€ ' + value ;
                            //     }
                            // }
                        }
                    }
                }
            });
        </script>
        {{-- </div> --}}

        <div class="card">
            {{-- <a class="add-btn" href="{{ route('clients.create') }}">Pridėti naują klientą</a> --}}
            <table>
                <tr>
                    <th>Metai</th>
                    <th>Menesis</th>
                    <th>Pajamos</th>
                </tr>
                <tr>
                    <td>2022</td>
                    <td>Sausis</td>
                    <td>{{ $sausisTotal }}</td>
                </tr>
                <tr>
                    <td>2021</td>
                    <td>Gruodis</td>
                    <td>{{ $gruodisTotal }}</td>
                </tr>
                <tr>
                    <td>2021</td>
                    <td>Lapkritis</td>

                </tr>

            </table>
        </div>
    </div>
@endsection






{{-- @foreach ($gruodis as $key => $value)
                    <tr>
                        <td>{{ $value }}</td>
                        <td>{{ $key }}</td>
                       {{-- <td> {{ \Carbon\Carbon::parse($day)->format('Y-m') }}</td> --}}
{{-- </tr>
                @endforeach --}}
