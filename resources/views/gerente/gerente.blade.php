@extends('Layouts.dashboard')

@section('css')
<style>
    .dataTables_filter { 
        display: none; 
    }
</style>
@endsection

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 style="font-weight: bold; color: #008080;"><i class="fas fa-suitcase nav-icon"></i></i> Gerência</h4>
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela onde podemos ver o fluxo das comandas e ver uma comanda especifica.</p>
        <div class="row d-flex justify-content-end">
            <div class="col">
                <div class="btn-group btn-group-toggle" id="teste" style="float: right; margin-right: 4.3%; width: 250px" data-toggle="buttons" >
                    <label class="btn btn-secondary active" id="bntFluxo" style="border-radius: 0% !important;">
                        <input type="radio" name="options" id="fluxo"   value="fluxo"> Fluxo
                    </label>
                    <label class="btn btn-secondary" id="bntComanda"style="border-radius: 0% !important;">
                        <input type="radio" name="options1" id="comanda"  value="comanda" checked> Comanda
                    </label>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-11" id="div_fluxo">
                <table class="table table-bordered justify-content-center" id="tabela_fluxo" style="margin-top: 0% !important; border-top: none !important; width: 100% !important; text-align: center;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mesa</th>
                            <th scope="col">Data</th>
                            <th scope="col">Valor total</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="">

                    </tbody>
                </table>
            </div>

            <div class="col-11" id="div_comanda">
                <table class="table table-bordered" style="text-align: left; border-top: none; " id="tabela_comanda">
                    <caption style="text-align: right; color: black; font-weight: bold;" id="caption_total"></caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preço por unidade</th>
                            <th scope="col">Preço Total</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_comanda">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $(".gerente").addClass("active");
        });
        $("#div_comanda").hide();
        console.clear();
    });
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function () {
        //-------------------------Tabela-----------------------------------//
        //Populando dados para a tabela de condutores
        tabela_fluxo = $('#tabela_fluxo').DataTable({
            "bJQueryUI": true,
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sSearch": "Pesquisar: ",
                "oPaginate": {
                    "sFirst": "Início",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            },
            "lengthChange": false,
            "bPaginate": false,
            "lengthChange": false,
            processing: false,
            serverSide: true,
            ajax: "{{route('genrencia.fluxo')}}",
            columns: [
            { data: 'mesa' },
            {
                'data': 'data',
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    moment.locale('pt-br');
                    $(nTd).html(moment(sData).format('DD/MM/YYYY HH:MM:SS'));
                }
            },
            {
                'data': 'preco_total',
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    dinheiro = parseFloat(sData).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                    $(nTd).html(dinheiro);
                }
            },            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        return tabela_fluxo;
    });
    
    $('input[type=radio]').change( function() {
        var id = $(this).attr("id"); 
        if (id == "fluxo") {
            $("#div_comanda").hide();
            $("#div_fluxo").show();
        } else {
            $("#div_fluxo").hide();
            $("#div_comanda").show();
        }
    });
    
    function verComanda(comanda_id) {
        $.ajax({
            type: "GET",
            url: "{{route('gerencia.view.comanda')}}",
            data: {"comanda_id":comanda_id},
            success: function (response) {
                if (response.length != 0) {
                    $("#div_fluxo").hide();
                    $("#div_comanda").show();
                    $('#bntComanda').addClass('active');
                    $('#bntFluxo').removeClass('active');

                    console.log(response);
                    var pedidos = '';
                    response.pedidos.forEach(pedido => {
                        pedidos += '<tr><td>'+pedido.nome+'</td>';
                        pedidos += '<td>'+pedido.quantidade+'</td>';
                        pedidos += '<td>'+parseFloat(pedido.preco).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'</td>';
                        pedidos += '<td>'+parseFloat(pedido.preco_total).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+'</td></tr>';
                    });

                    // console.log(pedidos);
                    $('#tbody_comanda').html(pedidos);


                    var preco_total = parseFloat(response.valor_total[0].preco_total).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                    $('#caption_total').text("Total a pagar: "+preco_total);
                }

            }
        });
    }
</script>
@endsection