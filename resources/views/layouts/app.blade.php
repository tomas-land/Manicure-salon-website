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

    <title>Vb-studija</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->

    <!-- Add the slick-theme.css if you want default styling -->
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> --}}

    <link href="/slick/slick-theme.css" rel="stylesheet">
    <link href="/slick/slick.css" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> --}}

    <script src="{{ mix('/js/app.js') }}"></script>




</head>

<body>
    <div id="photo-review-modal">


    </div>
    <a id="button-to-top"></a>


    @include('layouts.header')

    <main class="wrapper">

        @yield('content')
    </main>




    <script>
       
    </script>
    <script src="js/photo_enlarge.js"></script>
    <script src="js/file_upload_check.js"></script>
    <script src="node_modules\jquery\dist\jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/home_slider.js"></script>
    <script src="js/slide_menu.js"></script>
    <script src="js/jquery.js"></script>
    @include('layouts.footer')
</body>

</html>
