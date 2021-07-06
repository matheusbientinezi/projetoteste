<div class="modal fade" id="modal_cadastro_produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="nome_produto">Nome do Produto</label>
            <input type="text" class="form-control" name="nome_produto" id="nome_produto" placeholder="Nome do Produto">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="codigo_barra">Codigo de Barra</label>
              <input type="text" class="form-control" name="codigo_barra" id="codigo_barra" placeholder="Codigo de Barra">
            </div>
            <div class="form-group col-md-3">
              <label for="valor_venda">Valor</label>
              <input type="text" class="form-control" name="valor_venda" id="valor_venda" placeholder="Valor de Venda">
            </div>
            <div class="form-group col-md-3">
              <label for="estoque">Estoque</label>
              <input type="text" class="form-control" name="estoque" id="estoque" placeholder="Estoque">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" name="cadastrar_produto" id="cadastrar_produto">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

if (isset($_POST['cadastrar_produto'])) {

  $nome_produto = $_POST['nome_produto'];
  $codigo_barra = $_POST['codigo_barra'];
  $valor_venda = $_POST['valor_venda'];
  $estoque = $_POST['estoque'];

  $controller = new Controllers\ProdutosController;
  $cadastrar = $controller->cadastrarProduto($nome_produto, $codigo_barra, $valor_venda, $estoque);

  echo '<script>alert("Produto Cadastrado com sucesso!")</script>';
}

?>