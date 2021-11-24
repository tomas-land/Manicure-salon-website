@extends('admin.dashboard')
@section('admin-content')

    <div id="clients">
        <div class="card">
            <a class="add-btn" href="{{ route('clients.create') }}">Pridėti naują klientą</a>
            <table>
                <tr>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Telefonas</th>
                </tr>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->surname }}</td>
                        <td>+{{ $client->phone }}</td>
                        <td> <a class="btn-edit " href={{ route('clients.edit', $client->id) }}><i
                                    class="fas fa-edit red"></i></a>
                        </td>
                        <td>
                            <form action={{ route('clients.destroy', $client->id) }} method="POST">

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
