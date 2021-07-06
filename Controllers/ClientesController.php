<?php

namespace Controllers;

class ClientesController extends Controller
{

	public function __construct()
	{
		$this->view = new \Views\MainView('clientes');
	}

	public function executar()
	{
		$this->view->render(array('titulo' => 'Clientes'));
	}

	public function listarClientes()
	{
		$lista = new \Models\ClientesModel;
		return $mostrarlista = $lista->getAll();
	}

	public function cadastrarCliente($nome, $sobrenome, $celular, $cpf)
	{
		$cadastrar = new \Models\ClientesModel;
		$insert = $cadastrar->insertCliente($nome, $sobrenome, $celular, $cpf);
	}
}
