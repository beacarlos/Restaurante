@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 class="titulo"><i class="fas fa-clipboard-list nav-icon"></i> Comanda mesa </h4>
        <div class="row d-flex linha_titulo"></div>
        <div>
            
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-11" id="div_fluxo">
                <table class="table table-bordered justify-content-center" id="tabela_fluxo" style="margin-top: 0% !important; border-top: none !important; width: 100% !important; text-align: center;">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th scope="col">Prato</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comandax as $com) 
                            <tr>
                                <td>{{$com->pedido_id}}</td>
                                <td>{{$com->nome}}</td>
                                <td>{{$com->quantidade}}</td>
                                <td>R$ {{$com->preco_total}}</td>
                                <td>
                                    <a href="/mesa/pedido/excluir/{{$com->pedido_id}}" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @endforeach 

                    </tbody>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Total</th>
                                <th scope="col">{{$valor_tot}}</th>
                            </tr>
                        </thead>
                    </table>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection