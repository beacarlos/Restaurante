@extends('Layouts.dashboard')

@section('body')
<style>
.card {
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 28%;
  border-radius: 10px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 5px 14px;
  border-radius: 10px;
}

#valor{
  margin-left: 25%;
}
.containermt-3{
  margin-left:80%;
}

</style>
<div class="containerGG">
  <div class="containermt-3">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Novo prato
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Adicione um novo prato</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <div class="container">
              <form action="/cardapio/novoprato" method="POST" class="was-validated">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="uname">Nome:</label>
                  <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" required>
                  
                </div>
                <div class="form-group">
                  <label for="uname">Preço:</label>
                  <input type="number" class="form-control" id="price-number" placeholder="Enter price" name="price" required>
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
                  <textarea class="form-control" rows="5" id="comment" required name="descricao"></textarea>
                </div>
                <div>
                  <input type="checkbox" name="status" data-toggle="toggle" data-on="Ativado" data-off="Desativado"  data-width="110">
                  
                </div>
            </div>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <div class="containerc">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalc">
      Nova categoria
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="myModalc">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Adicione uma nova categoria</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <div class="container">
              <form action="/CategoriaPrato" method="POST" class="was-validated">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="uname">Nome:</label>
                  <input type="text" class="form-control" id="uname" placeholder="Enter username" name="nomeCat" required>
                </div>
            </div>
            <div class="container">            
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($categs as $cat)
                  <tr>
                    <td>{{$cat->categoria_prato_id}}</td>
                    <td>{{$cat->descricao}}</td>
                    <td>
                    <a href="/cardapio/editar/{{$cat->categoria_prato_id}}" class="btn btn-primary">Editar</a>
                    <a href="/cardapio/categoria/excluir/{{$cat->categoria_prato_id}}" class="btn btn-danger">Excluir</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar</button>

          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="card">
    <img src="https://static-images.ifood.com.br/image/upload/f_auto,t_medium/pratos/712f2c3e-43ed-42b0-801b-38567e20c9bf/201910111339_gPTF_i.jpg" alt="W3Schools.com">
    <div class="container">
      <h4><b>Mistão para 03 pessoas</b></h4>
      <p>Mistao para tres pessos,(frango assado, linguiça, carne bovina, uma porçao de baiao a moda, uma porçao de batata frita, vinagrete e farofa.)</p> 
    </div>
    <div class="disponivel">
      <!--<button type="button" class="btn btn-success" id="status">Ativo</button>-->
      <!--<button type="button" class="btn btn-warning" id="valor" disabled>Valor: R$ 48,90</button>-->
    </div>
    <div class="preco">
      <h6 id="valor" class="btn btn-warning">Valor: R$ 48,90</h6>
    </div>
  </div>
</div>
@endsection