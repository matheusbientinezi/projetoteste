<div class="modal fade" id="modal_cadastro_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Celular</label>
            <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular">
          </div>
          <div class="form-group">
            <label for="inputAddress2">CPF</label>
            <input type="text" class="form-control" name="cpf" id="CPF" placeholder="CPF">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" name="cadastrar_cliente" id="cadastrar_cliente">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

if (isset($_POST['cadastrar_cliente'])) {

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $celular = $_POST['celular'];
  $cpf = $_POST['cpf'];

  $controller = new Controllers\ClientesController;
  $cadastrar = $controller->cadastrarCliente($nome, $sobrenome, $celular, $cpf);

  echo '<script>alert("Cliente Cadastrado com sucesso!")</script>';
}

?>