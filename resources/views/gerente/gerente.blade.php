@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 style="font-weight: bold; color: #008080;"><i class="fas fa-tasks"></i> Gerência</h4>
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela onde podemos ver o fluxo das comandas e ver uma comanda especifica.</p>
        <div class="row d-flex justify-content-end">
            <div class="col">
                <div class="btn-group btn-group-toggle" style="float: right; margin-right: 4.3%; width: 250px" data-toggle="buttons" >
                    <label class="btn btn-secondary active" style="border-radius: 0% !important;">
                        <input type="radio" name="options" id="comanda" autocomplete="off" checked> Comanda
                    </label>
                    <label class="btn btn-secondary" style="border-radius: 0% !important;">
                        <input type="radio" name="options" id="btn_fluxo" autocomplete="off" > Fluxo
                    </label>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
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
        $("#div_fluxo").hide();
    });
</script>
@endsection