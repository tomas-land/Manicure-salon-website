@extends('admin.dashboard')
@section('admin-content')

    <div id="visits">
        <div class="card">
            <div class="title">Pridėkite naują vizitą:</div>
            <div class="card-body">
                <form action="{{ route('visits.store') }}" method="POST">
                    @csrf

                    <div class="inputs">


                        <input type="datetime-local" placeholder="dd-mm-yyyy" name="start" class="form-control" value="">
                        <input type="datetime-local" placeholder="Baigiasi" name="end" class="form-control" value="">
                        <input type="text" placeholder="Vardas" name="name" class="form-control" value="">
                        <input type="text" placeholder="Pavardė" class="input" name="surname" class="form-control" value="">

                        <select  name="service" id="" class="select">
                            <option  value="" selected disabled>Paslauga</option>
                            @foreach ($sub_services as $service)
                                <option class="option-disabled">{{ $service->name }}</option>

                            @endforeach
                        </select>
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
