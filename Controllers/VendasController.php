<?php
	
	namespace Controllers;

	class VendasController extends Controller
	{

		public function __construct(){
			$this->view = new \Views\MainView('vendas');
		}
		
		public function executar(){
			$this->view->render(array('titulo'=>'Vendas'));
		}

		public function listarVendas(){
			$lista = new \Models\VendasModel;
            return $mostrarlista = $lista->getAll();
		}

		public function insereTemp($id,$quantidade){
			$temp = new \Models\VendasModel;
			$insert = $temp->insertTemp($id,$quantidade);

		}

		public function buscaTemp(){
			$temp = new \Models\VendasModel;
			return $itens = $temp->selectTemp();
		}
			
	}

?>