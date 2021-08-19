@extends('admin.dashboard')
@section('admin-content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>



    <div id="calendar"></div>


    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Naujas vizitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('visits.store') }}" method="post" id="myform">
                        @csrf
                        <input type="text" name="service" placeholder="title">

                        <input type="text" name="name" placeholder="name">
                        <input id="datetimepicker-start" autocomplete="off" name="start" placeholder="start">
                        <input id="datetimepicker-end" autocomplete="off" id="end" name="end" placeholder="end">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <script>
        jQuery.datetimepicker.setLocale('lt');

        $(document).ready(function() {

            $('#datetimepicker-start').datetimepicker({
                step: 15
                // allowTimes: [
                //     '12:00', '13:00', '15:00',
                //     '17:00', '17:05', '17:20', '19:00', '20:00'
                // ]
            });
            $('#datetimepicker-end').datetimepicker({
                step: 15
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#calendar').fullCalendar({
                displayEventEnd: true,
                editable: true,

                selectable: true,
                selectHelper: true,
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
                events: "visits",
                eventRender: function(event, element) {

                    element.find('.fc-content').append(event.name);
                    element.find('.fc-content').append('<br>' + event.service);

                    jQuery('.fc-prev-button').attr('class', '');
                    jQuery('.fc-next-button').attr('class', '');
                    jQuery('.fc-today-button').attr('class', 'fc-today-button');
                    jQuery('.fc-month-button').removeClass('fc-state-default');
                    jQuery('.fc-agendaWeek-button').removeClass('fc-state-default');
                    jQuery('.fc-agendaDay-button').removeClass('fc-state-default');
                    
                },
                select: function(start, end) {

                    $(".modal").modal("show");
                    var starte = $.fullCalendar.formatDate(start,
                        'Y-MM-DD HH:mm:ss');
                    $('#datetimepicker-start').val(starte);
                    $('#datetimepicker-end').val(starte);

                    let form = $('#myform');


                    form.submit(function(e){
console.log('form');
                        e.preventDefault();

                        // $.ajax({
                        //     type: frm.attr('method'),
                        //     url: frm.attr('action'),
                        //     data: frm.serialize(),
                        //     success: function(data) {
                        //         console.log('Submission was successful.');
                        //         console.log(data);
                        //     },
                        //     error: function(data) {
                        //         console.log('An error occurred.');
                        //         console.log(data);
                        //     },
                        // });
                    });
                    // $('.myform').submit()
                    // $.ajax({
                    //     url: "/visits/action",
                    //     type: "POST",
                    //     data: {
                    //         name: name,
                    //         title: title,
                    //         start: start,
                    //         end: end,
                    //         type: 'add'
                    //     },
                    //     success: function(data) {
                    //         calendar.fullCalendar('refetchEvents');
                    //         alert("Event Created Successfully");
                    //     }
                    // })

                },

                // eventRender: function(event, element) {
                //   //dynamically prepend close button to event
                //   element
                //     .find(".fc-content")
                //     .prepend("<span class='closeon material-icons'>&#xe5cd;</span>");
                //   element.find(".closeon").on("click", function() {
                //     $("#calendar").fullCalendar("removeEvents", event._id);
                //   });
                // },

                // eventClick: function(calEvent, jsEvent) {
                //   // Display the modal and set event values.
                //   $(".modal").modal("show");
                //   $(".modal")
                //     .find("#title")
                //     .val(calEvent.title);
                //   $(".modal")
                //     .find("#starts-at")
                //     .val(calEvent.start);
                //   $(".modal")
                //     .find("#ends-at")
                //     .val(calEvent.end);
                //   $("#save-event").hide();
                //   $("input").prop("readonly", true);
                // },
                //     $("#save-event").on("click", function(event) {
                //     var title = $("#title").val();
                //     if (title) {
                //       var eventData = {
                //         title: title,
                //         start: $("#starts-at").val(),
                //         end: $("#ends-at").val()
                //       };
                //       $("#calendar").fullCalendar("renderEvent", eventData, true); // stick? = true
                //     }
                //     $("#calendar").fullCalendar("unselect");

                //     // Clear modal inputs
                //     $(".modal")
                //       .find("input")
                //       .val("");
                //     // hide modal
                //     $(".modal").modal("hide");
                //   });

                //   $("textarea").autosize();
                //             },

                // Bind the dates to datetimepicker.

                // editable: true,
                // eventResize: function(event, delta) {
                //     var start = $.fullCalendar.formatDate(event.start,
                //         'Y-MM-DD HH:mm:ss');
                //     var end = $.fullCalendar.formatDate(event.end,
                //         'Y-MM-DD HH:mm:ss');
                //     var title = event.title;
                //     var id = event.id;
                //     $.ajax({
                //         url: "/full-calender/action",
                //         type: "POST",
                //         data: {
                //             title: title,
                //             start: start,
                //             end: end,
                //             id: id,
                //             type: 'update'
                //         },
                //         success: function(response) {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Event Updated Successfully");
                //         }
                //     })
                // },
                // eventDrop: function(event, delta) {
                //     var start = $.fullCalendar.formatDate(event.start,
                //         'Y-MM-DD HH:mm:ss');
                //     var end = $.fullCalendar.formatDate(event.end,
                //         'Y-MM-DD HH:mm:ss');
                //     var title = event.title;
                //     var id = event.id;
                //     $.ajax({
                //         url: "/full-calender/action",
                //         type: "POST",
                //         data: {
                //             title: title,
                //             start: start,
                //             end: end,
                //             id: id,
                //             type: 'update'
                //         },
                //         success: function(response) {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Event Updated Successfully");
                //         }
                //     })
                // },

                eventClick: function(event) {
                    if (confirm("Are you sure you want to remove it?")) {
                        console.log(event.id);
                        var id = event.id;
                        $.ajax({
                            url: '/events/action',
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Deleted Successfully");
                            }
                        })
                    }
                }
            });

        });
    </script>


@endsection
