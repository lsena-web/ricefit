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
        events: '../admin/horario_aluno.php',
        extraParams: function() {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function(info) {
            // o event click serve para vc clicar no evento
            // console.log(info.event); // verifica informacoes do event

            // chamando modal
            var mod = new bootstrap.Modal(document.querySelector("#visualizar"));
            mod.show();

            // enviando informações para o modal vizualizar
            document.querySelector("#id").textContent = (info.event.id);
            document.querySelector("#title").textContent = (info.event.title);
            document.querySelector("#descricao").value = info.event.extendedProps['descricao'];
            document.querySelector("#linkVideo").href = "../admin/" + info.event.extendedProps['anexo'];

            document.glightbox.reload(); // ATUALIZANDO O GLIGHTBOX PARA O CAMINHO DO VIDEO SEJA ARMAZENADO NO MESMO

        }

    });

    calendar.render();
});