@extends('Layouts.dashboard')

@section('body')

<div class="content">
	<div class="container-fluid">
		<h4 class="titulo"><i class="fas fa-clipboard-list nav-icon"></i> Pedidos</h4>
		<div class="row d-flex linha_titulo"></div>
		<p class="info_titulo">Lista de pedidos.</p>
	</div>
	
	<div class="container" style="margin-bottom: 1rem;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Novo Pedido
		</button>
	</div>
	
	<div class="row">
		@for ($i = 1; $i <= $comandas; $i++)
		<div class="col-4">
			<div class="card text-white bg mb-3" style="max-width: 18rem;">
				<div class="card-header">Comanda {{$pedidos[$i]->comanda_id}} </div>
				<div class="card-body">
					@foreach ($pedidos as $item)
					@if ($i == $item->comanda_id)
					<p class="card-text"><i class="fas fa-check"></i> {{ $item->quantidade }} - {{ $item->nome }}	</p>
					@endif
					@endforeach
				</div>
				<div class="card-footer">
					<div class="spam-mesas">
						<p>Local: {{$pedidos[$i]->mesa}}</p>
					</div> 
					<button class="button-check">Concluir</button>
				</div>
			</div>
		</div>
		@endfor
		
	</div>
</div>

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Adicione um novo pedido</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container">
					<form action="/cardapio/novoprato" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-8">
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="acesso">Pratos </label>
										<select id="acesso" class="form-control" name="nivel_de_acesso">
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
										<div class="form-group col-md-12">
											<label for="acesso">Comanda </label>
											<select id="acesso" class="form-control" name="nivel_de_acesso">
												<option value="" selected>Escolher comanda...</option>
													{{-- @foreach ($full_dados_comandas	as $item)
													<option value="{{$item->comanda_id}}">
														{{$item->mesa_fk}}
													</option>
													@endforeach --}}
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="telefone">Quantidade</label>
												<input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade.">
											</div>
										</div>
									</div>
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
		
		@endsection
		
		@section('css')
		<style>
			.card {
				max-width: 18rem;
				box-shadow: 5px 5px 34px #57aa9a54;
			}
			.card-header {
				background-color: #57AA9A !important;
				border-bottom: 1px solid rgba(0,0,0,.125);
				padding: .75rem 1.25rem;
				position: relative;
				border-top-left-radius: .25rem;
				border-top-right-radius: .25rem;
			}
			p {
				margin-top: 0;
				margin-bottom: 5px;
			}
			.card-body {
				-ms-flex: 1 1 auto;
				flex: 1 1 auto;
				padding: 1.25rem;
				background-color: #fff;
				color: #929090;
			}
			.card-footer {
				padding: .75rem 1.25rem;
				background-color: rgba(249, 244, 244, 0.03);
				border-top: 0 solid rgba(0,0,0,.125);
				color: #929090;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			
			.spam-m {
				
			}
			
			.button-check {
				padding: 3px 10px;
				background-color: #57AA9A;
				color: #fff !important;
				border: none;
				border-radius: 5%;
				position: absolute;
				bottom: 10px;
				right: 10px;
				display: flex;
				justify-content: center;
				align-items: center;
				text-align: center;
			}
			
			.card.bg-dark .card-header {
				border-color: #57AA9A !important;
				background-color: #57AA9A !important;
			}
		</style>
		@endsection
		
		@section('js')
		<script>
			$(document).ready(function () {
				$(".pedidos").addClass("active");
			});
		</script>
		@endsection