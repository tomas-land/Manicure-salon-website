@extends('admin.dashboard')
@section('admin-content')

    <div id="clients">
        <div class="card">
            <div class="title">Pridėkite naują klientą:</div>
            <div class="card-body">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    <div class="inputs">

                        <input type="text" placeholder="Vardas" name="name" class="form-control" value="">
                        <input type="text" placeholder="Pavardė" name="surname" class="form-control" value="">
                        <input type="number" placeholder="Tel. nr." name="phone" class="form-control" value="">
                        @if (Auth::user() && Auth::user()->role == 'admin')
                            <input type="hidden" name="created_by" value="admin">
                        @else
                            <input type="hidden" name="created_by" value="guest">
                        @endif
                    </div>
                    <button type="submit" class="btn-submit">Išsaugoti</button>
                </form>
            </div>
        </div>
    @endsection
