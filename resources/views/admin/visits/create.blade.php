@extends('admin.dashboard')
@section('admin-content')

    <div id="visits">
        <div class="card">
            <div class="title">Pridėkite naują vizitą:</div>
            <div class="card-body">
                <form action="{{ route('visits.store') }}" method="POST">
                    @csrf

                    <div class="inputs">
                        <select name="client_id" class="first-option-color" id="">
                            <option value="" selected disabled >Pasirinkite klientą ...</option>
                            @foreach ($clients as $client)
                                <option name="name" value="{{ $client->id . '-' . $client->name . '-' . $client->surname }}">
                                    {{ $client->name . ' ' . $client->surname }}</option>
                            @endforeach
                        </select>

                        <input type="text" class="datetimepicker" placeholder="Pasirinkite vizito pradžios laiką ..." autocomplete="off" name="start"
                            class="form-control" value="">
                        <input type="text" class="datetimepicker" placeholder="Pasirinkite vizito pabaigos laiką ..." autocomplete="off" name="end"
                            class="form-control" value="">
                        <select name="service" id="" class="select">
                            <option value="" selected disabled>Pasirinkite paslaugą ...</option>
                            @foreach ($sub_services as $service)
                                <option class="option-disabled">{{ $service->name }}</option>

                            @endforeach
                        </select>
                        <input type="text" placeholder="Įveskite kainą " class="input" name="price" class="form-control"
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
                // $(this).css('backgroundColor', 'white')
                $(this).css('color', '#6d316d')
            })
          
        </script>
    @endsection
