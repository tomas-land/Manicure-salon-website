@extends('layouts.app')
@include('layouts.header')
@section('content')
    <div class="crud_layout">
        <div class="overlay">
          </div>

            <div class="card">
                <div class="card-header">Redaguoti:</div>
                <div class="card-body">
                    <form action="{{ route('paslaugos.update', $service->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            
                            <input type="text" name="name" class="form-control" value="{{ $service->name }}">
                            <input type="text" name="name" class="form-control" value="{{ $service->price }}">
       

                

                        <button type="submit" class="btn-submit">Išsaugoti</button>
                    </form>
                </div>
            </div>

        


    </div>
  
@endsection
@include('layouts.footer')
