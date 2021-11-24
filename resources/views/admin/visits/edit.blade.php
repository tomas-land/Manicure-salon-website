@extends('admin.dashboard')
@section('admin-content')

    <div id="visits">
        <div class="card">
            <div class="title">Redaguokite vizitą:</div>
            <div class="card-body">
                <form action="{{ route('visits.update', $visit->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="inputs">


                        <input type="text" class="datetimepicker" autocomplete="off" name="start" class="form-control"
                            value="{{ $visit->start }}">
                        <input type="text" class="datetimepicker" autocomplete="off" name="end" class="form-control"
                            value="{{ $visit->end }}">
                        <select name="service" id="" class="select">


                            <option value="{{ $visit->service }}" selected>{{ $visit->service }}</option>
                            @foreach ($sub_services as $service)
                                <option class="option-disabled">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="input" name="price" class="form-control"
                            value="{{ $visit->price }}">
                    </div>
                    <button type="submit" class="btn-submit">Išsaugoti</button>
                </form>
            </div>
        </div>

    @endsection
