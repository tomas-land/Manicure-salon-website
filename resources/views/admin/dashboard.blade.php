<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description"
        content="Virmantės Bašinskienės nagų priežiūros ir mokymų studija: gelinis lakavimas, nago stiprinimas, lakavimas be manikiūro, mega gelinis lakavimas, ...">
    <meta name="keywords"
        content="VB, Virmante , Basinskiene, Virmantė Bašinskienė, manikiūras , manikiuras , pedikiuras , mokymai" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VB-studija</title>
    <!-- Scripts -->

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/chart.js/chart.js') }}"></script>


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"
        integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> {{-- <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/lt.min.js"
        integrity="sha512-puKfCWuQL/kX4PlmgqCfR+n6DQKSmgQaIhDBOgXmG+cPML7X2kJe9IpUVFce9Ub9uCI1iL3QQ3oiGp+y99IuMw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
        integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"
        integrity="sha512-+UiyfI4KyV1uypmEqz9cOIJNwye+u+S58/hSwKEAeUMViTTqM9/L4lqu8UxJzhmzGpms8PzFJDzEqXL9niHyjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>

    <div id="photo-review-modal">
    </div>
    <a id="button-to-top"></a>
    <div id="dashboard">
        <div class="sidebar">
            <div class="menu">
                <div class="hide-menu">
                    <a id="hide_menu_arrow" class="material-icons">
                        arrow_back_ios_new
                    </a>
                </div>
                <div class="logout-btn">
                    <a class="" href=" {{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        <span class="material-icons">
                            logout
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
                <a href="{{ asset('/admin/clients') }}" class="sidebar-link"><span
                        class="material-icons icon">account_circle</span>Klientai</a>
                <a href="{{ asset('/admin/visits') }}" class="sidebar-link"><span class="material-icons icon">
                        wysiwyg</span>Vizitai</a>
                <a href="{{ asset('/admin/calendar') }}" class="sidebar-link"><span
                        class="material-icons icon">today</span>Kalendorius</a>
                <a href="{{ route('finance') }}" class="sidebar-link"><span class="material-icons icon">euro</span>Finansai</a>
                <a href="{{ route('statistics') }}" class="sidebar-link"><span class="material-icons icon">bar_chart</span>Statistika</a>
                <a href="{{ asset('home') }}" class="sidebar-link"><span
                        class="material-icons icon">language</span>Svetainė</a>
            </div>
            <div class="logo">
                <img src="{{ asset('images/logo-rosybrown.png') }}" alt="">
            </div>
        </div>


        <div class="content">

            <div class="top admin-top">
                <div class="background_orchid">
                    <div class="overlay">
                        <div class="title">Hello Virmante</div>
                    </div>
                </div>
            </div>
            {{-- @if (Auth::user() && Auth::user()->role == 'admin')
                <h6 class="">ADMIN</h6>
            @endif --}}




            @yield('admin-content')
        </div>


    </div>
   
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/calendar2.js') }}"></script>
    <script src="{{ asset('js/dashboard_slide_menu.js') }}"></script>

</body>

</html>
