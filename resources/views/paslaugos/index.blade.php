@extends('layouts.app')
@section('content')
    <div id="paslaugos">

        <div class="top">
            <img class="background_orchid" src="" alt="">
            <div class="overlay">
                <div class="title">Paslaugos</div>
            </div>
        </div>
        <div id="pricelist">
            <div class="container">
                <div class="image"></div>
                <div class="list">
                    <div class="title">Manikiūras</div>
                    <table>




                        @foreach ($manicure_services as $service)




                            <tr>
                                <td><span>{{ $service->name }}</span></td>
                                <td class="td-align-center"><span>{{ $service->price }}</span></td>
                                <td class="td-align-start"><i class="fas fa-euro-sign"></i></td> @auth
                                    <td> <a class="btn-edit " href={{ route('paslaugos.edit', $service->id) }}><i
                                                class="fas fa-edit red"></i></a></td>

                                    <td>
                                        <form action={{ route('paslaugos.destroy', $service->id) }} method="POST">

                                            @csrf @method('delete')
                                            <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>





                        @endforeach
                    </table>

                </div>
            </div>
            <div class="container container2">
                <div class="image"></div>
                <div class="list">

                    <table>
                        @foreach ($manicure2_services as $service)
                            <tr>
                                <td><span>{{ $service->name }}</span></td>
                                <td class="td-align-center"><span>{{ $service->price }}</span></td>
                                <td class="td-align-start"><i class="fas fa-euro-sign"></i></td> @auth
                                    <td> <a class="btn-edit " href={{ route('paslaugos.edit', $service->id) }}><i
                                                class="fas fa-edit red"></i></a></td>

                                    <td>
                                        <form action={{ route('paslaugos.destroy', $service->id) }} method="POST">

                                            @csrf @method('delete')
                                            <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endauth

                            </tr>


                        @endforeach
                    </table>
                </div>
            </div>
            <div class="container container3">
                <div class="image"></div>
                <div class="list">
                    <div class="title">Pedikiuras</div>
                    <table>
                        @foreach ($pedicure_services as $service)
                            <tr>
                                <td ><span>{{ $service->name }}</span></td>
                                <td class="td-align-center"><span>{{ $service->price }}</span></td>
                                <td class="td-align-start"><i class="fas fa-euro-sign"></i></td> @auth
                                    <td> <a class="btn-edit " href={{ route('paslaugos.edit', $service->id) }}><i
                                                class="fas fa-edit red"></i></a></td>

                                    <td>
                                        <form action={{ route('paslaugos.destroy', $service->id) }} method="POST">

                                            @csrf @method('delete')
                                            <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>
            <div class="container container4">
                <div class="image"></div>
                <div class="list">
                    <div class="title">Pilingas</div>
                    <table>
                        @foreach ($piling_services as $service)
                            <tr>
                                <td><span>{{ $service->name }}</span></td>
                                <td class="td-align-center"><span>{{ $service->price }}</span></td>
                                <td class="td-align-start"><i class="fas fa-euro-sign"></i></td> @auth
                                    <td> <a class="btn-edit " href={{ route('paslaugos.edit', $service->id) }}><i
                                                class="fas fa-edit red"></i></a></td>

                                    <td>
                                        <form action={{ route('paslaugos.destroy', $service->id) }} method="POST">

                                            @csrf @method('delete')
                                            <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
            <div class="container container5">
                <div class="image"></div>
                <div class="list">
                    <div class="title">Antakiai</div>
                    <table>
                        @foreach ($eyebrow_services as $service)
                            <tr>
                                <td><span>{{ $service->name }}</span></td>
                                <td class="td-align-center"><span>{{ $service->price }}</span></td>
                                <td class="td-align-start"><i class="fas fa-euro-sign"></i></td>
                                @auth
                                    <td> <a class="btn-edit " href={{ route('paslaugos.edit', $service->id) }}><i
                                                class="fas fa-edit red"></i></a></td>

                                    <td>
                                        <form action={{ route('paslaugos.destroy', $service->id) }} method="POST">

                                            @csrf @method('delete')
                                            <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
            <div class="container container6">
                <div class="image"></div>
                <div class="list">
                    <div class="title">Depiliacija</div>
                    <table>

                        @foreach ($depilation_services as $service)
                            <tr>
                                <td><span>{{ $service->name }}</span></td>
                                <td class="td-align-center"><span>{{ $service->price }}</span></td>
                                <td class="td-align-start"><i class="fas fa-euro-sign"></i></td>
                                @auth
                                    <td> <a class="btn-edit " href={{ route('paslaugos.edit', $service->id) }}><i
                                                class="fas fa-edit red"></i></a></td>

                                    <td>
                                        <form action={{ route('paslaugos.destroy', $service->id) }} method="POST">

                                            @csrf @method('delete')
                                            <button type="submit" class="btn-delete " value=""><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>


        </div>
        @auth
            <div class="btn-add-subservice">
                <a href="{{ route('paslaugos.create') }}" class="btn btn-success">Pridėti paslaugą</a>
            </div>


        @endauth


    </div>


    </div>























@endsection

