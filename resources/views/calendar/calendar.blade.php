<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='{{ asset('fullcalendar/main.css')}}' rel='stylesheet' />
    <script src='{{ asset('fullcalendar/main.js')}}'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: '{!! date("Y-m-01") !!}',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @foreach ($eventos as $evento)
                    {!! '{"title":"'.$evento->name.'","start":"'.$evento->start_time.'","url":"",},' !!}
                @endforeach
            ]
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>
