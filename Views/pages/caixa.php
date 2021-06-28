<div class="chamada">
	<div class="center">
	<h2><?php echo $arr['titulo'];?></h2>
	</div><!--center-->
</div><!--chamada-->
<div class="home principal">
	<div class="center">
		<div class="row">
			<div class="col-sm-12">
				<div class="buscaproduto">
				<form method="post">
						<div class="form-row">
							<div class="form-group col-md-11">
								<label for="inputAddress">Busca Produto</label>
								<select type="text" class="form-control" name="busca_produto" id="busca_produto" placeholder="Busca Produto">
									<option value=""></option>
									<?php 
									$selectproduto = new Controllers\ProdutosController;
									$listarprodutos = $selectproduto->listarprodutos();

									foreach($listarprodutos as $produto){?>
									<option value="<?php echo $produto['id']?>"><?php echo $produto['nome_produto']."| R$".$produto['valor_produto']."| Cód.Barra: ".$produto['codigo_barra']?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group col-md-1">
								<label for="enviar_produto">Inserir Prod</label>
								<button type="submit" class="btn btn-success" name="enviar_produto">+</button>
							</div>
						</div>
					</form>
					<?php
					if(isset($_POST['enviar_produto'])){
					$produto_id = $_POST['busca_produto'];
					$infoprod = $selectproduto->buscaProduto($produto_id);
					};
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="dados">
					<form method="POST">
						<div class="form-group">
							<label for="inputAddress">Produto</label>
							<input type="text" name="id" value="<?php echo $infoprod['id']?>" hidden/>
							<input type="text" value="<?php echo isset($infoprod['nome_produto']) ? $infoprod['nome_produto'] : 'Nome Produto'?>" class="form-control" name="nome_produto" id="nome_produto" placeholder="nome_produto">
						</div>
						<div class="form-group">
							<label for="inputAddress">Cód. Barra</label>
							<input type="text" value="<?php echo isset($infoprod['codigo_barra']) ? $infoprod['codigo_barra'] : 'Cód. Barra'?>" class="form-control" name="codigo_barra" id="codigo_barra" placeholder="Cód. Barra">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							<label for="inputEmail4">quantidade</label>
							<input type="text" value="1" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade">
							</div>
							<div class="form-group col-md-6">
							<label for="inputPassword4">Valor</label>
							<input type="text" value="<?php echo isset($infoprod['valor_produto']) ? $infoprod['valor_produto'] : 'Valor'?>" class="form-control" name="valor" id="valor" placeholder="Valor">
							</div>
						</div>
						<div class="form-group">
							<button name="adicionar_produto" id ="adicionar_produto" class="btn btn-success"><i class="fas fa-plus"></i></button><i>   (Adicionar Produto)</i>
						</div>
					</form>
				</div>
			</div>
			<?php
			$controllervenda = new Controllers\VendasController;

			if(isset($_POST['adicionar_produto'])){

				$id = $_POST['id'];
				$nome_produto = $_POST['nome_produto'];
				$codigo_barra = $_POST['codigo_barra'];
				$quantidade = $_POST['quantidade'];
				$valor = $_POST['valor'];
			
				$dados_itens= $controllervenda->insereTemp($id,$quantidade,$valor);
			}
			?>
			<div class="col-sm-8">
				<div class="resumo">
					<table class="table">
						<thead>
							<tr>
							<th scope="col">id</th>
							<th scope="col">Produto</th>
							<th scope="col">Cod. Barra</th>
							<th scope="col">Valor/Quantidade</th>
							<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$selectemp = $controllervenda->buscaTemp();
							foreach($selectemp as $item){?>
							<tr>
							<th scope="row"><?php echo $item['id']?></th>
							<td><?php echo $item['nome_produto']?></td>
							<td><?php echo $item['codigo_barra']?></td>
							<td><?php echo "R$".$item['valor_produto']." x ".$item['quantidade']?></td>
							<td><?php echo "R$".$item['soma']?></td>
							</tr>
							<?php }; ?>
						</tbody>
					</table>
				</div>
				<div class="finalizar_venda">
					<button name="finalizar_venda" id ="finalizar_venda" class="btn btn-success" data-toggle="modal" data-target="#modal_cadastro_venda">Finalizar Venda</button>
					<button name="cancelar_venda" id ="cancelar_venda" class="btn btn-danger" data-toggle="modal" data-target="#modal_cancelar_venda">Cancelar Venda</button>
				</div>
				<div class="total">
					<h4 style="color:white; margin-top:5px;">TOTAL:</h4>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'templates/modal_cadastro_venda.php';
?>
