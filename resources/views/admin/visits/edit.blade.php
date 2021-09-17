@extends('admin.dashboard')
@section('admin-content')

    <div id="visits">
        <div class="card">
            <div class="title">Pridėkite naują vizitą:</div>
            <div class="card-body">
                <form action="{{ route('visits.update', $visit->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="inputs">


                        <input type="text"  class="datetimepicker" placeholder="Prasideda" autocomplete="off" name="start" class="form-control" value="{{$visit->start}}">
                        <input type="text" class="datetimepicker" placeholder="Baigiasi" autocomplete="off" name="end" class="form-control" value="{{$visit->end}}">
                        <input type="text" placeholder="Vardas" name="name" class="form-control" value="{{$visit->name}}">
                        <input type="text" placeholder="Pavardė" class="input" name="surname" class="form-control" value="{{$visit->surname}}">

                        <select name="service" id="" class="select">
                            
                            @foreach ($sub_services as $service)
                            <option value="{{ $service->name }}" selected >{{ $service->name }}</option>
                                {{-- <option class="option-disabled">{{ $service->name }}</option> --}}

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
