@extends('Layouts.dashboard')

@section('body')
<div class="content">
    <div class="container-fluid">
        <h4 class="titulo"><i class="fas fa-user"></i> Cadastro de pessoas.</h4>
        <div class="row d-flex linha_titulo"></div>
        <p class="info_titulo">Tela que possibilita cadastro de pessoas.</p>
    </div>
    
    <div class="container" >
        <div class="alert alert-danger" style="display:none"></div>
        <form>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="imgUp">
                            <img src="{{ asset('img/user.png') }}" draggable="false" class="imagePreview">
                            <label class="btn btn-primary btn-upload">
                                Selecione uma foto.
                                <input type="file" class="uploadFile img" id="uploadFile" name="uploadFile">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo.">
                            <p id="nome_txt"></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" min="3" max="8" name="password" class="form-control" id="senha" placeholder="Senha.">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="acesso">Nivel de acesso: </label>
                            <select id="acesso" class="form-control" name="nivel_de_acesso">
                                <option value="" selected>Escolher...</option>
                                @foreach ($nivel_de_acesso as $item)
                                <option value="{{$item->pessoa_tipo_id}}">
                                    {{$item->descricao}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>            
            <button type="submit" class="btn btn-primary">Cadastrar Pessoa</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/pessoa.js') }}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pessoa.css') }}">
@endsection