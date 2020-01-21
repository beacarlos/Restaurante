@extends('Layouts.dashboard')

@section('css')
<style>
    .imagePreview {
        max-width: 100%;
        width: 1000px;
        height: 254px;
        object-fit: cover;
        
    }
    .btn-upload
    {
        display:block;
        border-radius:0px;
        box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
        margin-top:-7px;
        font-size: 15px;
        text-decoration: none;
        padding: 10px;
    }
    
</style>
@endsection

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 style="font-weight: bold; color: #008080;"><i class="fas fa-user"></i> Edição de pessoas.</h4>
        <div class="row d-flex" style="border-bottom: 1px black solid; margin-right: 2%; "></div>
        <p style="font-size: 12px; font-weight: bold; color: dimgrey;">Tela que possibilita edição dos dados de pessoas.</p>
    </div>
    
    <div class="container" >
        @if (isset($dados_pessoa) && !empty($dados_pessoa))
        <form style="margin-right: 2%;">
            <div class="row">
                <div class="col">
                    {{-- <img src="{{ asset('img/user.png') }}" class="img-fluid" draggable="false"> --}}
                    <div class="row">
                        <div class="imgUp">
                            <img src="/img_perfil/{{$dados_pessoa[0]->imagem}}" class="imagePreview">
                            <label class="btn btn-primary btn-upload">
                                Selecione uma foto.<input type="file" class="uploadFile img" id="uploadFile" name="uploadFile" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo." value="{{$dados_pessoa[0]->nome}}">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$dados_pessoa[0]->pessoa_id}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF." value="{{$dados_pessoa[0]->cpf}}">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email." value="{{$dados_pessoa[0]->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" min="3" max="8" name="password" class="form-control" value="" id="senha" placeholder="Senha.">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone."value="{{$dados_pessoa[0]->telefone}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="acesso">Nivel de acesso: </label>
                            <select id="acesso" class="form-control" name="nivel_de_acesso">
                                <option value="" selected>Escolher...</option>
                                @foreach ($nivel_de_acesso as $item)
                                <option value="{{$item->pessoa_tipo_id}}" {{ $item->descricao == $dados_pessoa[0]->nivel_de_acesso ? 'selected' : '' }}>
                                    {{$item->descricao}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="float: right;">Editar Pessoa</button>
        </form>           
        @else
        {{"Erro ao gerar a página de edição!"}}
        @endif
    </div>
</div>
@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    //Eventos de preview de imagens.
    $("#uploadFile").change(function () {
        const file = $(this)[0].files[0]
        const fileReader = new FileReader()
        
        if((file.type == "image/jpeg" || file.type == "image/png") || (file.type == "image/jpg")){
            fileReader.onloadend = function () {
                $(".imagePreview").attr('src', fileReader.result)
            }
            fileReader.readAsDataURL(file);
        }
        else{
            console.log("não é imagem");
        }
    });
    
    $("form").submit(function (e) { 
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "post",
            url: "{{route('pessoa.cadastro')}}",
            data: formData,
            contentType: false,
            cache: false,
            async: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Editado com sucesso! ',
                    showConfirmButton: false,
                    timer: 5000
                });

                $(location).attr('href', '{{route("pessoa.listagem.view")}}');
            },
            error: function (response) {
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'Aconteceu algo inesperado! ',
                    showConfirmButton: false,
                    timer: 5000
                });            
            }
        });
    });
</script>
@endsection