<div class="modal fade" id="modal_cadastro_venda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Finalizar Venda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="nome_produto">Inserir desconto(%)</label>
            <input type="text" class="form-control" name="desconto" id="desconto" placeholder="Desconto em porcentagem">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="codigo_barra">Total</label>
              <input type="text" readonly class="form-control" name="total" id="total" placeholder="Total">
            </div>
            <div class="form-group col-md-6">
              <label for="valor_venda">Qtd Itens</label>
              <input type="text" readonly class="form-control" name="quantidade_itens" id="quantidade_itens" placeholder="Qtd Itens">
            </div>
          </div>
          <div class="form-group">
            <label for="nome_produto">Cliente</label>
            <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Inserir cliente">
          </div>
          <div class="form-group">
            <label for="nome_produto">Total Pago</label>
            <input type="text" class="form-control" name="total_pago" id="total_pago" placeholder="Valor pago pelo cliente">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" name="finalizar" id="finalizar">Finalizar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

if (isset($_POST['cadastrar_venda'])) {

  $desconto = $_POST['desconto'];
  $quantidade_itens = $_POST['quantidade_itens'];
  $cliente = $_POST['cliente'];
  $total_pago = $_POST['total_pago'];

  $vendacontroller = new Controllers\ProdutosController;
  $cadastrar = $vendacontroller->cadastrarProduto($desconto, $quantidade_itens, $cliente, $total_pago);
}

?>