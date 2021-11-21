document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        headerToolbar: {
            left: 'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,dayGridDay'
        },
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        eventLimit: true,
        events: 'horario_informacoes.php',
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
            document.querySelector("#start").textContent = (info.event.start.toLocaleString());
            document.querySelector("#end").textContent = (info.event.end.toLocaleString());
            document.querySelector("#descricao").value = info.event.extendedProps['descricao'];
            document.querySelector("#linkVideo").href = info.event.extendedProps['anexo'];

            document.glightbox.reload(); // ATUALIZANDO O GLIGHTBOX PARA O CAMINHO DO VIDEO SEJA ARMAZENADO NO MESMO

            // estou fazendo isso quando for abrir o evento sem ter que mostrar a div editar
            let inform = document.getElementById("inform");
            let edit = document.getElementById("editar");

            // se contem a class hide da um toggle ou seja a classe sai;....        hide está no stile.css
            if (inform.classList.contains("hide")) {
                inform.classList.toggle("hide");
            }

            // se não contem hide da um toggle
            if (!edit.classList.contains("hide")) {
                edit.classList.toggle("hide");
            }

            // informando valores para modal atualizar
            document.querySelector("#codigo").value = info.event.id;
            document.querySelector("#titulo").value = info.event.title;
            document.querySelector("#nomeExercicio").textContent = info.event.extendedProps['nome'];
            document.querySelector("#cor").value = info.event.backgroundColor;
            document.querySelector("#editDescricao").value = info.event.extendedProps['descricao'];
            document.querySelector("#inicio").value = info.event.start.toLocaleString();
            document.querySelector("#fim").value = info.event.end.toLocaleString();

            // informando ID para deletar
            document.querySelector("#apagarEvento").value = (info.event.id);

        },

        // deixa os quadrados do full calendar clicaveis
        selectable: true,
        select: function(info) {
            var modCadastrar = new bootstrap.Modal(document.querySelector("#cadastrar"));
            modCadastrar.show();
            // colocando valores dentro dos inputs quando for cadastrar
            document.querySelector("#c-start").value = info.start.toLocaleString();
            document.querySelector("#c-end").value = info.end.toLocaleString();

        }


    });
    calendar.render();
});

// aqui é a lógica da troca de divs entre editar e visualizar 


// ao clicar no botão de editar a div inform ganha hide e a div editar perde hide
window.onload = function() {
    let btEditar = document.getElementById("btnEditar");

    btEditar.addEventListener("click", function() {
        let info = document.getElementById("inform");
        let edit = document.getElementById("editar");
        info.classList.toggle("hide");
        edit.classList.toggle("hide");
    });
    // ao clicar no botão de cancelar a div editar ganha hide e a div inform perde hide
    let btCancel = document.getElementById("btnCancel");

    btCancel.addEventListener("click", function() {
        let info = document.getElementById("inform");
        let edit = document.getElementById("editar");
        info.classList.toggle("hide");
        edit.classList.toggle("hide");

    });

};



//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '0000/00/00 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}