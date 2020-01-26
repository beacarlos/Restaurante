@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <!-- onde se coloca as coisas -->
        <h3 class="text-center col-sm-11 col-md-11 text-bold text-light bg-dark" style="margin-bottom: 0px; margin-left: 2.8%;">Mapa das mesas</h3>
        
        <div class="row col-sm-11 col-md-11 bg-gradient-gray container-mesas">
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="1">1</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="5">5</button>
            <button Comportamento type='button' class="col-1 offset-5 btnMesa" data-toggle="dropdown" id="13">13</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="17">17</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="2">02</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="6">06</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="9">09</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="11">11</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="14">14</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="18">18</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="3">03</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="7">07</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="10">10</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="12">12</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="15">15</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="19">19</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="4">04</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="8">08</button>
            <button Comportamento type='button' class="col-1 offset-5 btnMesa" data-toggle="dropdown" id="16">16</button>
            <button Comportamento type='button' class="col-1 offset-1 btnMesa" data-toggle="dropdown" id="20">20</button>            
            
            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Status</h6>
                <a Color-Change-G class="dropdown-item" href="#" ;">Disponível</a>
                <div class="dropdown-divider"></div>
                <a Color-Change-R class="dropdown-item" href="#" ;">Ocupado</a>
                <div class="dropdown-divider"></div>
                <input type="hidden" id="mesa" name="mesa">
                <a class="dropdown-item" href="#" onclick="this.href='mesa/comandax/'+document.getElementById('mesa').value">Comanda</a>
            </div>
        </div>
        
        
        
    </div>
    <!-- /.container-fluid -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <h4 class="modal-title">Mesa- </h4>
                        <p class="modal-title" id="demo"></h4>
                        <input type="text" class="modal-title" id="demo">
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <button type="button" class="btn btn-primary">+Pedir</button>
                        <button type="button" class="btn btn-danger">Fechar</button>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-11" id="div_fluxo">
                            <table class="table table-bordered justify-content-center" id="tabela_fluxo" style="margin-top: 0% !important; border-top: none !important; width: 100% !important; text-align: center;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Prato</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($collection as $item) --}}
                                        <tr>
                                            <td>""</td>
                                            <td>""</td>
                                            <td>""</td>
                                            <td>
                                                <button class="btn btn-danger">APAGAR</a>
                                            </td>
                                    {{-- @endforeach --}}

                                </tbody>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col">Total</th>
                                            <th scope="col">{total}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </table>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/mesa.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".mesas").addClass("active");
    });

        const botao = document.querySelectorAll("[Comportamento]");
        const arrayBotoes = []

        for (let i = 0; i < botao.length; i++) {
            botao[i].addEventListener("click", function(e) {    
                console.log(`O elemento clicado foi o ${this.innerHTML}`);
                x = this.innerHTML
                arrayBotoes.push(this)
                document.getElementById("demo").innerHTML = x
                document.getElementById("mesa").value = this.innerHTML
            })
        }

    
    /*
    for (let i = 0; i < botao.length; i++) {
            botao[i].addEventListener("click", function(e) {
                console.log(`O elemento clicado foi o ${this.innerHTML}`);
                arrayBotoes.push(this)
            })
        }*/
</script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/mesa.css') }}">
@endsection
