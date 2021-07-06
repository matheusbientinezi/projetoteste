<?php

namespace Controllers;

class ProdutosController extends Controller
{
	public function __construct()
	{
		$this->view = new \Views\MainView('produtos');
	}

	public function executar()
	{
		$this->view->render(array('titulo' => 'Produtos'));
	}

	public function listarprodutos()
	{
		$lista = new \Models\ProdutosModel;
		return $mostrarlista = $lista->getAll();
	}

	public function cadastrarProduto($nome_produto, $codigo_barra, $valor_venda, $estoque)
	{
		$cadastrar = new \Models\ProdutosModel;
		$insert = $cadastrar->insertProduto($nome_produto, $codigo_barra, $valor_venda, $estoque);
	}

	public function buscaProduto($produto_id)
	{
		$busca = new \Models\ProdutosModel;
		return $produto = $busca->buscaProdId($produto_id);
	}
}
