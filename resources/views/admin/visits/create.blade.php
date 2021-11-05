@extends('admin.dashboard')
@section('admin-content')

    <div id="visits">
        <div class="card">
            <div class="title">Pridėkite naują vizitą:</div>
            <div class="card-body">
                <form action="{{ route('visits.store') }}" method="POST">
                    @csrf

                    <div class="inputs">
                        {{-- <input type="text" placeholder="Vardas" name="name" class="form-control" value="">
                        <input type="text" placeholder="Pavardė" class="input" name="surname" class="form-control" value=""> --}}
                        <select name="client_id" id="" class="form-control">
                            <option value="" selected disabled>Pasirinkite</option>
                            @foreach ($clients as $client)
                                <option name="name" value="{{ $client->id . '-' . $client->name }}">
                                    {{ $client->name . ' ' . $client->surname }}</option>
                            @endforeach
                        </select>

                        <input type="text" class="datetimepicker" placeholder="Prasideda" autocomplete="off" name="start"
                            class="form-control" value="">
                        <input type="text" class="datetimepicker" placeholder="Baigiasi" autocomplete="off" name="end"
                            class="form-control" value="">
                        <select name="service" id="" class="select">
                            <option value="" selected disabled>Paslauga</option>
                            @foreach ($sub_services as $service)
                                <option class="option-disabled">{{ $service->name }}</option>

                            @endforeach
                        </select>
                        <input type="text" placeholder="Kaina" class="input" name="price" class="form-control"
                            value="">
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
        <script>
            //change select input background and color on change
            $("select").change(function() {
                $(this).css('backgroundColor', 'white')
                $(this).css('color', '#6d316d')
            })
            //change input background color on key down
            $("input").keydown(function() {
                $(this).css('backgroundColor', 'white')
            })
        </script>
    @endsection
