@extends('layouts.app')
@include('layouts.header')
@section('content')
    <div class="crud_layout">
        <div class="overlay">
          </div>

            <div class="card">
                <div class="card-header">Sukurkite naują paslaugą:</div>
                <div class="card-body">
                    <form action="{{ route('paslaugos.store') }}" method="POST">
                        @csrf
                      
                        <div class="form-group">
                            
                            <input type="text" placeholder="Paslaugos pavadinimas" name="name" class="form-control" value="">
                            <input type="text" placeholder="Paslaugos kaina" name="price" class="form-control" value="">


                                <select name="service_id" id="" class="form-control">
                                    <option value="" selected disabled>Pasirinkite</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('author_id')
                                    <div class="alert ">{{ $message }}</div>
                                @enderror --}}
                            
                            </div>
                        <button type="submit" class="btn-submit">Išsaugoti</button>
                    </form>
                </div>
            </div>

        


    </div>
  
@endsection
@include('layouts.footer')


