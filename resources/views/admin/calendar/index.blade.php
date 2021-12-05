@extends('admin.dashboard')
@section('admin-content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>



    <div id="calendar"></div>


    <div class="modal fade" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Naujas vizitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="myform">
                        <select name="client_id" id="calendar-modal-id" class="form-control">
                            <option value="" selected disabled>Pasirinkite klientą ...</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name . ' ' . $client->surname }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="datetimepicker" id="calendar-modal-start" placeholder="Prasideda"
                            autocomplete="off" name="start" class="form-control" value="">
                        <input type="text" class="datetimepicker" id="calendar-modal-end" placeholder="Baigiasi"
                            autocomplete="off" name="end" class="form-control" value="">
                        <select name="service" id="calendar-modal-select" class="select">
                            <option value="" selected disabled>Pasirinkite paslaugą ...</option>
                            @foreach ($sub_services as $service)
                                <option class="option-disabled">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" placeholder="Įveskite kainą" class="input" id="calendar-modal-price"
                            name="price" class="form-control" value="">
                        <div class="select-color">
                            <label class="container">
                                <input type="radio" checked="checked" value="#8f3d92" name="color">
                                <span class="checkmark" style="background-color: #8f3d92"></span>
                            </label>
                            <label class="container">
                                <input type="radio" value="#8500ff" name="color">
                                <span class="checkmark" style="background-color: #8500ff"></span>
                            </label>

                            <label class="container">
                                <input type="radio" value="#4865cd" name="color">
                                <span class="checkmark" style="background-color: #4865cd"></span>
                            </label>
                            <label class="container">
                                <input type="radio" value="#d7488d" name="color">
                                <span class="checkmark" style="background-color: #d7488d"></span>
                            </label>
                        </div>
                        @if (Auth::user() && Auth::user()->role == 'admin')
                            <input type="hidden" id="calendar-modal-role" name="created_by" value="admin">
                        @else
                            <input type="hidden" id="calendar-modal-role" name="created_by" value="guest">
                        @endif
                        <button type="submit" class="btn-submit ">Patvirtinti</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
  



@endsection
