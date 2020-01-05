@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end">
            <div class="col">
                <div class="btn-group btn-group-toggle" style="float: right; margin-right: 4.3%; width: 250px" data-toggle="buttons">
                    <label class="btn btn-secondary active" style="border-radius: 0% !important;">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Comanda
                    </label>
                    <label class="btn btn-secondary" style="border-radius: 0% !important;">
                        <input type="radio" name="options" id="option2" autocomplete="off" > Fluxo
                    </label>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-11">
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    
</script>
@endsection