@extends('layouts.app')
@section('content')
    <div id="galerija">

        <section class="top">
            <img class="background_orchid" src="" alt="">
            <div class="overlay">
                <div class="title">Galerija</div>
            </div>
        </section>

        <section class="photo-holder salon">
            <div class="title">Salonas</div>
            <div class="container">
                <img class="salon-photo enlarge-photo" src="{{ asset('images/sal-1re.jpg') }}"></img>
                <img class="salon-photo enlarge-photo" src="{{ asset('images/sal-2re.jpg') }}"></img>
                <img class="salon-photo enlarge-photo" src="{{ asset('images/sal-3re.jpg') }}"></img>
            </div>
        </section>

        <section class="photo-holder">
            <div class="title">Naujausi darbai</div>
            <div class="container">
                @foreach ($photos as $photo)
                    <div class="new-photo enlarge-photo-new"
                        style="background-image: url('{{ asset('storage/images/' . $photo->name) }}');">
                         <input type="hidden" id="hidden-url" value="{{ asset('storage/images/' . $photo->name) }}">
                        @auth
                            <form action={{ route('galerija.destroy', $photo->id) }} method="POST">
                                @csrf @method('delete')
                                <button type="submit" class="btn-delete gallery-photo-delete" value=""><i class="fas fa-trash "></i>
                                </button>
                            </form>
                        @endauth
                    </div>

                @endforeach
            </div>
            @auth
                <form action="{{ route('galerija.store') }}" id="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="btn-holder">
                        <label id="label" for="fileinput" class="btn-add-photo">
                            <input type="file" name="image" id="fileinput" multiple="multiple" style="display: none">
                            <span>Pasirinkti nuotrauką</span>
                            <i id="check" class="fas fa-check check"></i>
                        </label>
                        <button type="submit" id="submit" class="btn-add-photo">Pridėti nuotrauką</button>

                    </div>

                </form>

            @endauth



        </section>
    </div>

























@endsection
