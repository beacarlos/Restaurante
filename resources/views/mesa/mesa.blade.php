@extends('Layouts.dashboard')

@section('css')
<style>
    .btnMesa {
        outline: none !important;
        border: none;
        padding: 22px;
        margin-top: 30px;
        text-align: center;
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 20px;
        line-height: 1.33;
    }

    .container-mesas {
        padding-right: 7%;
        padding-bottom: 2%;
        margin-left: 2.8%;
    }
</style>
@endsection

@section('body')

<br />
<div class="content">
    <div class="container-fluid">
        <!-- onde se coloca as coisas -->
        <h3 class="text-center col-sm-11 col-md-11 text-bold text-light bg-dark" style="margin-bottom: 0px; margin-left: 2.8%;">Mapa das mesas</h3>

        <div class="row col-sm-11 col-md-11 bg-gradient-gray container-mesas">
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="1">01</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="5">05</button>
            <button Comportamento type='button' class="col-1 offset-5 bg-success btnMesa" data-toggle="dropdown" data-mesa="13">13</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="17">17</button>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="2">02</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="6">06</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="9">09</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="11">11</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="14">14</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="18">18</button>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="3">03</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="7">07</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="10">10</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="12">12</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="15">15</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="19">19</button>
            <div class="w-100"></div>
            <div class="w-100"></div>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="4">04</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="8">08</button>
            <button Comportamento type='button' class="col-1 offset-5 bg-success btnMesa" data-toggle="dropdown" data-mesa="16">16</button>
            <button Comportamento type='button' class="col-1 offset-1 bg-success btnMesa" data-toggle="dropdown" data-mesa="20">20</button>

            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Status</h6>
                <a Color-Change-G class="dropdown-item" href="#" ;">Disponível</a>
                <div class="dropdown-divider"></div>
                <a Color-Change-R class="dropdown-item" href="#" ;">Ocupado</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">Comanda</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Comanda Mesa X</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <button type="button" class="btn btn-primary">+ Pedido</button>
                    <button type="button" class="btn btn-danger">Encerrar</button>
                </div>
                <div class="row d-flex justify-content-center" style="margin-left: 1%; margin-right: 0.5%;">
                    <div class="col-12" id="div_fluxo" style="margin-right: 3%;">
                        <table class="table table-bordered justify-content-center" id="tabela-usuarios" style="text-align: center;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col" width="13%">prato</th>
                                    <th scope="col" width="10%">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $(document).ready(function() {
        $(".mesas").addClass("active");
    });

    const a1 = document.querySelector('[Color-Change-G]')
    const a2 = document.querySelector('[Color-Change-R]')


    const botao = document.querySelectorAll("[Comportamento]");
    console.log(botao[0].dataset.mesa);
    const arrayBotoes = []

    for (let i = 0; i < botao.length; i++) {
        botao[i].addEventListener("click", function(e) {
            console.log(`O elemento clicado foi o ${this.innerHTML}`);
            arrayBotoes.push(this)
        })
    }

    a1.onclick = function(e) {
        e.preventDefault();
        arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-danger', 'bg-success');
        console.log("hsdhds");
    }

    a2.onclick = function(e) {
        e.preventDefault();
        arrayBotoes[arrayBotoes.length - 1].classList.replace('bg-success', 'bg-danger');
    }
</script>
@endsection