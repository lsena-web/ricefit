document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        headerToolbar: {
            left: 'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,dayGridDay'
        },
        // initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        eventLimit: true,
        events: '../admin/horario_informacoes.php',
        extraParams: function() {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function(info) {
            // o event click serve para vc clicar no evento

            // chamando modal
            var mod = new bootstrap.Modal(document.querySelector("#exampleModal"));
            mod.show();

            var cod = document.querySelector("#id");
            cod.textContent = (info.event.id);

            var title = document.querySelector("#title");
            title.textContent = (info.event.title);

            var start = document.querySelector("#start");
            start.textContent = (info.event.start.toLocaleString());

            var end = document.querySelector("#end");
            end.textContent = (info.event.end.toLocaleString());




        }

    });

    calendar.render();
});