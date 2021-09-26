
        jQuery.datetimepicker.setLocale('lt');
        $('.datetimepicker').datetimepicker({
            step: 15
            // allowTimes: [
            //     '12:00', '13:00', '15:00',
            //     '17:00', '17:05', '17:20', '19:00', '20:00'
            // ]
        });
 
    
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
                minTime: '07:00:00',
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
                      
                        var client_id = $('#calendar-modal-id').val();
                        var name = $('#calendar-modal-id option:selected').text();
                        // var surname = $('#calendar-modal-surname').val();
                        var service = $('#calendar-modal-select').val();
                        var price = $('#calendar-modal-price').val();
                       var start = $('#calendar-modal-start').val();
                       var end = $('#calendar-modal-end').val();

console.log(client_id);

                        e.preventDefault();
                        $.ajax({
                            url: "calendar/action",
                            type: "POST",
                            data: {
                                client_id:client_id,
                                name:name,
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
    