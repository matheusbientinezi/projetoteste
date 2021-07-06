<div class="chamada">
	<div class="center">
		<h2><?php echo $arr['titulo'] ?></h2>
	</div>
	<!--center-->
</div>
<!--chamada-->
<div class="sobre principal">
	<div class="center">
		<h2>Lista de Venda</h2>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Cliente</th>
					<th scope="col">Data Venda</th>
					<th scope="col">Quantidade</th>
					<th scope="col">Desconto</th>
					<th scope="col">Valor Compra</th>
					<th scope="col">Valor Total</th>
				</tr>
			</thead>

			<?php

			$listarvendas = new \Controllers\VendasController;
			$printarvendas = $listarvendas->listarVendas();
			foreach ($printarvendas as $vendas) {
			?>

				<tbody>
					<tr>
						<td><?php echo $vendas['id'] ?></td>
						<td><?php echo $vendas['nome'] ?></td>
						<td><?php echo $vendas['data_cadastro'] ?></td>
						<td><?php echo $vendas['quantidade'] ?></td>
						<td><?php echo $vendas['porcentagem_desconto'] . "%" ?></td>
						<td><?php echo "R$" . $vendas['valor'] ?></td>
						<td><?php echo "R$" . $vendas['total'] ?></td>
						<td>
							<button id="deletebutton" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
							<button id="editbutton" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_cadastro_cliente"><i class="fas fa-edit"></i></button>
						</td>
					</tr>

				<?php
			}
				?>

		</table>
	</div>
</div>
<!--sobre-->