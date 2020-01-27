@extends('Layouts.dashboard')

@section('body')
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
                  <form action="#" method="POST" class="was-validated" id="novo_prato">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <div class="col">
                           <div class="imgUp">
                              <img src="{{ asset('img/user.png') }}" class="imagePreview" style="width: 100%;height: 100%">
                              <label class="btn btn-primary btn-upload">
                                 Selecione uma foto.
                                 <input type="file" class="uploadFile img" id="uploadFile" name="uploadFile" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
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
                           <option value=""> Categoria:</option>
                           
                           @foreach ($categs as $categoria)
                           <option value="{{$categoria->categoria_prato_id}}"> {{$categoria->descricao}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="description">Descriçao</label>
                        <textarea class="form-control" rows="5" id="comment" required name="descricao"></textarea>
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
                  <div class="container" style="overflow: auto; width: 98%; height: 250px; border:solid 0.5px">
                     <table class="table table-hover">
                        <thead>
                           <tr>
                              <th width="10%">id</th>
                              <th width="45%">Descrição</th>
                              <th width="45%">Ações</th>
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
               <img src="{{ asset('img_pratos/'.$pratos->imagem) }}" width="100%" height="100%" style="object-fit: cover;">
               <div class="container">
                  <h4><b>{{$pratos->nome}}</b></h4>
                  <p>{{$pratos->descricao}}</p>
               </div>
               <div class="btn-group-vertical">
                  <div style=" height: 8px; width: 8px;">
                     <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ">
                        </button>
                        <div class="dropdown-menu" >
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

@section('css')
<link rel="stylesheet" href='{{asset("css/cardapio.css")}}'>
@endsection

@section('js')
<script src="{{ asset('js/cardapio.js') }}"></script>
@endsection