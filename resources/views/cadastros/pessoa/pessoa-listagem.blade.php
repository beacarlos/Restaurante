@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 style="font-weight: bold; color: #008080;"><i class="fas fa-tasks"></i> Gerência</h4>
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela onde podemos ver o fluxo das comandas e ver uma comanda especifica.</p>
        <div class="row d-flex justify-content-center table-striped">
        <div class="col-12" id="div_fluxo" style="margin-right: 3%;" >
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
        $(".pessoas").addClass("active");
    });
</script>
@endsection
