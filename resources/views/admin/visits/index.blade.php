@extends('admin.dashboard')
@section('admin-content')

    <div id="visits">
        <div class="card">
            <a class="add-btn" href="{{ route('visits.create') }}">Pridėti naują vizitą</a>
            <table>
                <tr>
                    <th>Data</th>
                    <th>Laikas</th>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Paslauga</th>
                </tr>
                @foreach ($visits as $visit)
                    <tr>
                        
                        <td>{{ \Carbon\Carbon::parse($visit->start)->format('m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($visit->start)->format('H:i') }} - {{ \Carbon\Carbon::parse($visit->end)->format('H:i') }}</td>
                        <td>{{ $visit->name }}</td>
                        <td>{{ $visit->surname }}</td>
                        <td>{{ $visit->service }}</td>
                        <td> <a class="btn-edit " href={{ route('visits.edit', $visit->id) }}><i
                                    class="fas fa-edit red"></i></a>
                        </td>
                        <td>
                            <form action={{ route('visits.destroy', $visit->id) }} method="POST">

                                @csrf @method('delete')
                                <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
