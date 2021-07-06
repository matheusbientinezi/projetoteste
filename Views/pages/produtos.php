<div class="chamada">
	<div class="center">
		<h2><?php echo $arr['titulo'] ?></h2>
	</div>
	<!--center-->
</div>
<!--chamada-->
<div class="sobre principal">
	<div class="center">
		<h2>Lista de Produtos</h2><button id="editbutton" class="btn btn-success" data-toggle="modal" data-target="#modal_cadastro_produto">+Cadastrar</button>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Codigo de Barra</th>
					<th scope="col">Descrição</th>
					<th scope="col">Valor</th>
					<th scope="col">Data Cadastro</th>

				</tr>
			</thead>

			<?php
			include 'templates/modal_cadastro_produto.php';
			$listaprodutos = new \Controllers\ProdutosController;
			$printarlista = $listaprodutos->listarprodutos();
			foreach ($printarlista as $produtos) {
			?>

				<tbody>
					<tr>
						<td><?php echo $produtos['id'] ?></td>
						<td><?php echo $produtos['codigo_barra'] ?></td>
						<td><?php echo $produtos['nome_produto'] ?></td>
						<td><?php echo "R$" . $produtos['valor_produto'] ?></td>
						<td><?php echo $produtos['data_cadastro'] ?></td>
						<td>
							<button id="deletebutton" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
							<button id="editbutton" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_cadastro_produto"><i class="fas fa-edit"></i></button>
						</td>
					</tr>

				<?php
			}
				?>

		</table>
	</div>
</div>
<!--produto-->