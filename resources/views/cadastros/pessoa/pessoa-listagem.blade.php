@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 style="font-weight: bold; color: #008080;"><i class="far fa-user nav-icon"></i> Pessoa</h4>
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela onde podemos ver todos os usuários cadastrados no sistema.</p>
        <div class="row  justify-content-end ">
            <a href="{{ route('pessoa.view')}}" type="button" class="btn btn-primary" style="margin-right: 3%; margin-bottom: 1%;"> <i class="fas fa-plus-square nav-icon"></i> Novo cadastro</a>
        </div>
        <div class="row d-flex justify-content-center table-striped">
            <div class="col-12" id="div_fluxo" style="margin-right: 3%;" >
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nível de acesso</th>
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
        $(".item-cadastro").addClass("menu-open");
    });
</script>
@endsection
