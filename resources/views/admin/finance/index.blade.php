@extends('admin.dashboard')
@section('admin-content')

    <div id="finance">
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
    <td>{{$sausisTotal}}</td>    
</tr>
<tr>
    <td>2021</td>   
    <td>Gruodis</td>
    <td>{{$gruodisTotal}}</td>     
</tr>
<tr>
    <td>2021</td>   
    <td>Lapkritis</td>   
     
</tr>

            </table>
        </div>
    </div>
@endsection






{{-- 
                @foreach ($gruodis as $key => $value)
                    <tr>
                        <td>{{ $value }}</td>
                        <td>{{ $key }}</td>
                       {{-- <td> {{ \Carbon\Carbon::parse($day)->format('Y-m') }}</td> --}}
                    {{-- </tr>
                @endforeach --}} 