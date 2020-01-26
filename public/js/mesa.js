
$(document).ready(function () {
    $(".mesas").addClass("active");

    disponibilidadeMesas();
    setTimeout("disponibilidadeMesas()", 3000);

});

// const a1 = document.querySelector('[Color-Change-G]')
// const a2 = document.querySelector('[Color-Change-R]')


// const botao = document.querySelectorAll("[Comportamento]");
// console.log(botao[0].dataset.mesa);
// const arrayBotoes = []

// for (let i = 0; i < botao.length; i++) {
//     botao[i].addEventListener("click", function (e) {
//         console.log(`O elemento clicado foi o ${this.innerHTML}`);
//         arrayBotoes.push(this)
//     })
// }

// a1.onclick = function(e){
//     e.preventDefault();
//     arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-danger', 'bg-success');
//     console.log("hsdhds");
// }

// a2.onclick = function (e){
//     e.preventDefault();
//     arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-success', 'bg-danger');
// }


function disponibilidadeMesas() {
$.ajax({
    type: "get",
    url: "/mesa/ver",
    success: function (response) {

        response.forEach(mesa => {
            $('.btnMesa').each(function(){
                mesaButtom = $(this).attr('id');
                if ((mesaButtom == mesa.mesa_id) && (mesa.disponibilidade == 0)) {
                    $("#"+mesa.mesa_id).addClass('bg-success');
                } else if ((mesaButtom == mesa.mesa_id) && (mesa.disponibilidade == 1)) {
                    $("#"+mesa.mesa_id).addClass('bg-danger');
                }
            });
        });
    }
});
}