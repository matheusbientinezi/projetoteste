<?php
	
	define('INCLUDE_PATH','http://localhost/projetoteste/');
	define('INCLUDE_PATH_FULL','http://localhost/projetoteste/Views/pages/');
	class Application
	{
		
		public function executar(){
			$url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Caixa';

			$url = ucfirst($url);
			$url.="Controller";
			$className = 'Controllers\\'.$url;
			$controler = new $className;
			$controler->executar();
			
		}
	}
	
?>