@extends('Layouts.dashboard')

@section('body')
<style>
   .card {
      box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 95%;
      border-radius: 10px;
   }
   .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
   }
   .container {
      /* padding: 5px 14px; */
      border-radius: 10px;
   }
   .preco {
      text-align: center !important;
   }
</style>
<div class="containerGG">
   <div class="container" style="margin-bottom: 1rem;">
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalc">
         Nova categoria
      </button>

      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
         Novo prato
      </button>
   </div>

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
                        <div class="col">
                           {{-- <img src="{{ asset('img/user.png') }}" class="img-fluid" draggable="false"> --}}
                           <div class="imgUp">
                              <img src="{{ asset('img/user.png') }}" class="imagePreview" style="width: 100%;height: 100%">
                              <label class="btn btn-primary btn-upload">
                                 Selecione uma foto.<input type="file" class="uploadFile img" id="uploadFile" name="uploadFile" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                              </label>
                           </div>
                        </div>
                     </div>
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
                        <input type="checkbox" name="status" data-toggle="toggle" data-on="Ativado" data-off="Desativado" data-width="110">

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
               <div class="container" style="overflow: auto; width: 475px; height: 250px; border:solid 0.5px">
                  <table class="table table-hover" style="width:475px">
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
                              <a href="/cardapio/categoria/editar/{{$cat->categoria_prato_id}}" class="btn btn-primary">Editar</a>
                              @if (isset($message))
                              <button onclick="erroDelCat()" class="btn btn-danger">APAGAR</a>
                                 @else
                                 <a href="/cardapio/categoria/excluir/{{$cat->categoria_prato_id}}" class="btn btn-danger">Excluir</a>
                                 @endif
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

<div class="container">
   <div class="row">
      @foreach($prat as $pratos)
      <div class="col-4">
         <div class="card">
            <img src="https://static-images.ifood.com.br/image/upload/f_auto,t_medium/pratos/712f2c3e-43ed-42b0-801b-38567e20c9bf/201910111339_gPTF_i.jpg" alt="W3Schools.com">
            <div class="container">
               <h4><b>{{$pratos->nome}}</b></h4>
               <p>{{$pratos->descricao}}</p>
            </div>
            <div class="btn-group-vertical">
               <div style=" height: 8px; width: 8px;">
                  <div class="btn-group">
                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ">
                  </button>
                  <div class="dropdown-menu">
                        <a class="dropdown-item" href="cardapio/prato/excluir/{{$pratos->prato_id}}">Excluir</a>
                        <a class="dropdown-item" href="cardapio/prato/editar/{{$pratos->prato_id}}" disabled>Editar</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="preco">
            <h6 id="valor" class="btn btn-warning">Valor: R$ {{$pratos->preco}}</h6>
         </div>
      </div>
   </div>
   @endforeach
</div>
</div>
</div>
@endsection
@section('js')
<script>
   $(document).ready(function() {
      $(".cardapio").addClass("active");
   });
   function erroDelCat() {
      alert("Hello! I am an alert box!");
   };
   $("#uploadFile").change(function() {
      const file = $(this)[0].files[0]
      console.log(file.type);
      const fileReader = new FileReader()
      if ((file.type == "image/jpeg" || file.type == "image/png") || (file.type == "image/jpg")) {
         fileReader.onloadend = function() {
            $(".imagePreview").attr('src', fileReader.result)
         }
         fileReader.readAsDataURL(file);
      } else {
         console.log("não é imagem");
      }
   });
</script>
@endsection