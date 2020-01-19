@extends('Layouts.dashboard')

@section('css')
<style>
    .delete {
        border: solid 1px #d12c38; background-color:transparent; color:#d12c38;
    }
    .delete:hover {
        border: solid 1px #d12c38; background-color: #d12c38; color:#fff;
    }
    
    .edit {
        border: solid 1px #036aa0; background-color:#036aa0; color:#fff;
    }
    
    .btnNovoCadastro {
        margin-right: 3%; margin-bottom: 1%; background-color: #036aa0;
    }
</style>
@endsection

@section('body')
<div class="content" style="margin-bottom: 2%">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 justify-content-between">
                <h4 style="font-weight: bold; color: #008080;"><i class="far fa-user nav-icon"></i> Pessoa</h4>
            </div>
            <div class="col-6 ">
                <div class="row justify-content-end " style="margin-right: 1%;">
                    <a href="{{ route('pessoa.view')}}" type="button" class="btn btn-primary btnNovoCadastro"> <i class="fas fa-plus-square nav-icon"></i> Novo cadastro</a> 
                </div>
            </div>
        </div>
        
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela onde podemos ver todos os usuários cadastrados no sistema.</p>
        
        <div class="row d-flex justify-content-center" style="margin-left: 1%; margin-right: 0.5%;">
            <div class="col-12" id="div_fluxo" style="margin-right: 3%;" >
                <table class="table table-bordered justify-content-center" id="tabela-usuarios" style="text-align: center;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col" width="13%">Telefone</th>
                            <th scope="col" width="25%">Email</th>
                            <th scope="col" width="15%">Nível de acesso</th>
                            <th scope="col" width="10%">Ações</th>
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
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function () {
        //-------------------------Tabela-----------------------------------//
        //Populando dados para a tabela de condutores
        tabela = $('#tabela-usuarios').DataTable({
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
            processing: false,
            serverSide: true,
            ajax: "{{route('pessoa.listagem.datatables')}}",
            columns: [
            {
                data: 'imagem',
                name: 'imagem',
                render: function(data, type, full, meta){
                    return "<img src={{ URL::to('/') }}/img_perfil/" + data + " width='50' height='70' class='img-thumbnail' />";
                },
                orderable: false
            },
            
            { data: 'nome' },
            { data: 'telefone' },
            { data: 'email' },
            { data: 'nivel_de_acesso' },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        return tabela;
        
    });
    
    function editarPessoa(id) { 
        console.log(id);
    }
    
    function deletarPessoa(id) {
        Swal.fire({
            title: 'Você tem certeza?',
            text: "Isso não pode ser revertido!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, pode deletar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "{{route('pessoa.exluir')}}",
                    data: {"id":id},
                    success: function (response) {
                        tabela.ajax.reload();
                        Swal.fire('Deletado!',  'O usuário não pode mais ter acesso ao sistema.',  'success');
                    }
                });
            }
        })
    }
</script>
@endsection
