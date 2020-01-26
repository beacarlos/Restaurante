@extends('Layouts.dashboard')

@section('body')
<div>
    <p>Editar prato</p>
    <div class="form-group">
        <div class="container">
            <form action="/cardapio/alterar/{{$prat->prato_id}}" method="POST" class="was-validated">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="uname">Nome:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" value="{{$prat->nome}}" required>
                </div>
                <div class="form-group">
                    <label for="uname">Preço:</label>
                    <input type="number" step="0.01" class="form-control" id="price-number" placeholder="Enter price" name="price" value="{{$prat->preco}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria do prato</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="descricaoCat">
                        @foreach ($categs as $categoria)
                        <option value="{{$categoria->categoria_prato_id}}"> {{$categoria->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Descriçao</label>
                    <textarea class="form-control" rows="5" id="comment" required name="descricao" value="{{$prat->descricao}}"></textarea>
                </div>
                <div>
                    <input type="checkbox" name="status" data-toggle="toggle" data-on="Ativado" data-off="Desativado" data-width="110">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection