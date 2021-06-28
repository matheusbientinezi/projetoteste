<div class="chamada">
	<div class="center">
	<h2><?php echo $arr['titulo'] ?></h2>
	</div><!--center-->
</div><!--chamada-->
<div class="sobre principal">
	<div class="center">
		<h2>Lista de Clientes</h2><button id ="editbutton" class="btn btn-success" data-toggle="modal" data-target="#modal_cadastro_cliente">+Cadastrar</button>

		<table class="table">
		<thead>
			<tr>
			<th scope="col">Nome</th>
			<th scope="col">Sobrenome</th>
			<th scope="col">Celular</th>
			<th scope="col">CPF</th>
			</tr>
		</thead>

        <?php 
		include 'templates/modal_cadastro_cliente.php';
        $listacliente = new \Controllers\ClientesController;
        $printarlista = $listacliente->listarClientes();
		foreach($printarlista as $clientes){
		?>

		<tbody>
			<tr>
			<td><?php echo $clientes['nome']?></td>
			<td><?php echo $clientes['sobrenome']?></td>
			<td><?php echo $clientes['celular']?></td>
			<td><?php echo $clientes['cpf']?></td>
			<td>
			<button id= "deletebutton" class="btn btn-outline-danger"><i class="fas fa-user-minus"></i></button>
			<button id= "editbutton" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_cadastro_cliente" ><i class="fas fa-user-edit"></i></button>
			</td>
			</tr>

		<?php
		}
		?>
		
		</table>
	</div>
</div><!--sobre-->