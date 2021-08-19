@extends('admin.dashboard')
@section('admin-content')

    <div id="clients">
        <div class="card">
            <div class="title">Redaguokite duomenys:</div>
            <div class="card-body">
                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="inputs">
                        
                        <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                        <input type="text" name="surname" class="form-control" value="{{ $client->surname }}">
                        <input type="number" name="phone" class="form-control" value="{{ $client->phone }}">
              
                    <button type="submit" class="btn-submit">Išsaugoti</button>
                </form>
            </div>
        </div>
    @endsection
