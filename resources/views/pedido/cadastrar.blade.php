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
        <form action="/pedido/cadastrar" method="POST">
          {{ csrf_field() }}

            <div class="row">
                <div class="col-8">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="prato">Pratos </label>
                      <select id="prato" class="form-control" name="prato">
                          <option value="" selected>Escolher prato...</option>
                          @foreach ($pratos as $item)
                          <option value="{{$item->prato_id}}">
                            {{$item->nome}}
                          </option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="comanda">Comanda </label>
                        <select id="comanda" class="form-control" name="comanda">
                            <option value="" selected>Escolher comanda...</option>
                             @foreach ($dados_comandas as $item)
                            <option value="{{$item->comanda_id}}">
                                {{$item->mesa_fk}}
                            </option>
                            @endforeach 
                        </select>
                      </div>
                        <div class="form-group col-md-6">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade.">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <button type="submit" class="btn btn-primary">Salvar Pedido</button>
                        </div>
                    </div>
                </div>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pessoa.css') }}">
@endsection