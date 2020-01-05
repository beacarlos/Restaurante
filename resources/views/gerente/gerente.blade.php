@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 style="font-weight: bold; color: #008080;"><i class="fas fa-tasks"></i> Gerência</h4>
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela onde podemos ver o fluxo das comandas e ver uma comanda especifica.</p>
        <div class="row d-flex justify-content-end">
            <div class="col">
                <div class="btn-group btn-group-toggle" id="teste" style="float: right; margin-right: 4.3%; width: 250px" data-toggle="buttons" >
                    <label class="btn btn-secondary active" style="border-radius: 0% !important;">
                        <input type="radio" name="options1" id="comanda"  value="comanda" checked> Comanda
                    </label>
                    <label class="btn btn-secondary" style="border-radius: 0% !important;">
                        <input type="radio" name="options" id="fluxo"   value="fluxo"> Fluxo
                    </label>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center table-striped">
            <div class="col-11" id="div_comanda">
                <table class="table" style="text-align: left;">
                    <caption style="text-align: right;">Valor Total: Bla bla bla </caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item 1</td>
                            <td>1</td>
                            <td>RS 45</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-11" id="div_fluxo">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mesa</th>
                            <th scope="col">Data</th>
                            <th scope="col">Valor total</th>
                        </tr>
                    </thead>
                    <tbody>
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
        console.clear();
        $("#div_fluxo").hide();
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
</script>
@endsection