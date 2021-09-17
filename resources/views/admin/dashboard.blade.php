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


    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}

    {{-- //fullcalendar --}}


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
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                <a href="" class="sidebar-link"><span class="material-icons icon">euro</span>Finansai</a>
                <a href="" class="sidebar-link"><span class="material-icons icon">bar_chart</span>Statistika</a>
                <a href="{{ asset('home') }}" class="sidebar-link"><span class="material-icons icon">language</span>Svetainė</a>
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

            @yield('admin-content')
        </div>


    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        let hide_menu_arrow = document.getElementById('hide_menu_arrow');
        hide_menu_arrow.addEventListener('click', (e) => {
            e.target.classList.toggle('arrow-rotate');
            let sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('sidebar-closed');
            let menu_icons = document.querySelectorAll('.icon');
            menu_icons.forEach(icon => {
                icon.classList.toggle('sidebar-link-move');
            });
            let logo = document.querySelector('.logo');
            logo.classList.toggle('logo-opacity');


        })
    </script>
    <script>
        jQuery.datetimepicker.setLocale('lt');
        $('.datetimepicker').datetimepicker({
            step: 15
            // allowTimes: [
            //     '12:00', '13:00', '15:00',
            //     '17:00', '17:05', '17:20', '19:00', '20:00'
            // ]
        });
    </script>
    <script>
        $(document).ready(function() {



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#calendar').fullCalendar({
                displayEventEnd: true,
                editable: true,
                selectable: true,
                allDaySlot: false,
                defaultView: 'agendaWeek',
                height: 'auto',
                minTime: '05:00:00',
                maxTime: '23:00:00',
                // slotDuration: '00:30:00',
                // slotLabelInterval: 30,
                // slotLabelFormat: 'h(:mm)',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                locale: "lt",
                events: "calendar",
                eventRender: function(event, element) {

                    element.find('.fc-content').append(event.name);
                    element.find('.fc-content').append('<br>' + event.service);
                    element.find('.fc-time').css("font-weight", "500");
                    jQuery('.fc-prev-button').attr('class', '');
                    jQuery('.fc-next-button').attr('class', '');
                    jQuery('.fc-today-button').attr('class', 'fc-today-button');
                    jQuery('.fc-month-button').removeClass('fc-state-default');
                    jQuery('.fc-agendaWeek-button').removeClass('fc-state-default');
                    jQuery('.fc-agendaDay-button').removeClass('fc-state-default');

                },
                selectHelper: true,

                select: function(start, end, allDay) {

                    $('#mymodal').modal('show');
                    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                    $('#calendar-modal-start').val(start);
                    $('#calendar-modal-end').val(end);
                    $('#myform').submit(function(e) {
                        var name = $('#calendar-modal-name').val();
                        var surname = $('#calendar-modal-surname').val();
                        var service = $('#calendar-modal-select').val();
                        var price = $('#calendar-modal-price').val();

                        e.preventDefault();
                        $.ajax({
                            url: "calendar/action",
                            type: "POST",
                            data: {
                                name: name,
                                surname: surname,
                                service: service,
                                price: price,
                                start: start,
                                end: end,
                                type: 'add'

                            },

                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                // alert("Event Created Successfully");
                            }
                        })
                        $('#myform').trigger("reset");
                        $('#mymodal').modal('hide');
                    })

                },

                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },


                eventClick: function(event) {
                    if (confirm("Ar norite ištrinti šį vizitą ?")) {
                        var id = event.id;
                        
                        $.ajax({
                            url: "calendar/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                // alert("Event Deleted Successfully");
                            }
                        })
                    }
                }
            });

        });
    </script>
</body>

</html>
