<?php

namespace Controllers;

class CaixaController extends Controller
{

	public function __construct()
	{
		$this->view = new \Views\MainView('caixa');
	}
	public function executar()
	{
		$this->view->render(array('titulo' => 'Caixa'));
	}
}
