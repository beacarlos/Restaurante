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
                <div class="col-8">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="acesso">Pratos </label>
                      <select id="acesso" class="form-control" name="nivel_de_acesso">
                          <option value="" selected>Escolher prato...</option>
                          {{-- @foreach ($nivel_de_acesso as $item)
                          <option value="{{$item->pessoa_tipo_id}}">
                              {{$item->descricao}}
                          </option>
                          @endforeach --}}
                      </select>
                    </div>
                  </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="acesso">Comanda </label>
                        <select id="acesso" class="form-control" name="nivel_de_acesso">
                            <option value="" selected>Escolher comanda...</option>
                            {{-- @foreach ($nivel_de_acesso as $item)
                            <option value="{{$item->pessoa_tipo_id}}">
                                {{$item->descricao}}
                            </option>
                            @endforeach --}}
                        </select>
                      </div>
                        <div class="form-group col-md-6">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="telefone">Quantidade</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone.">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <button type="submit" class="btn btn-primary">Cadastrar Pessoa</button>
                        </div>
                    </div>
                </div>
            </div>            
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