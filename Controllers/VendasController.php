<?php

namespace Controllers;

class VendasController extends Controller
{

	public function __construct()
	{
		$this->view = new \Views\MainView('vendas');
	}

	public function executar()
	{
		$this->view->render(array('titulo' => 'Vendas'));
	}

	public function listarVendas()
	{
		$lista = new \Models\VendasModel;
		return $mostrarlista = $lista->getAll();
	}

	public function insereTemp($id, $quantidade)
	{
		$temp = new \Models\VendasModel;
		$insert = $temp->insertTemp($id, $quantidade);
	}

	public function buscaTemp()
	{
		$temp = new \Models\VendasModel;
		return $itens = $temp->selectTemp();
	}

	public function cancelaVenda()
	{
		$temp = new \Models\VendasModel;
		$cancela = $temp->deleteTempVenda();
	}

	public function buscaDadosTempGeral()
	{
		$venda = new \Models\VendasModel;
		return $busca = $venda->selectDadosGeralTemp();
	}

	public function finalizarVenda($desconto, $quantidade_itens, $cliente, $total_pago)
	{
		$venda = new \Models\VendasModel;
		$inseretvenda = $venda->insertVenda($desconto, $cliente, $total_pago);
		$inserevenda_itens = $venda->insertVendaItens($quantidade_itens);
	}
}
