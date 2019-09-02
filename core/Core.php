<?php

	function is_valido($cache)
	{
		$ultima_modificacao = filemtime($cache);
		$c = time() - $ultima_modificacao;

		if ($c > 10)//tempo em segundos
		{
			return false;
		}
		else
		{
			return true;
		}
	}

class Core {

	public function run() {

		$url = '/';
		if(isset($_GET['url'])) {
			$url .= $_GET['url'];
		}

		$url = $this->checkRoutes($url);

		$params = array();

		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController';
			$currentAction = 'index';
		}
		/*Não colocar em paginas Dinamicas*/
		if (file_exists('cache/'.$currentController.'_'.$currentAction.'.cache')
			&& is_valido('cache/'.$currentController.'_'.$currentAction.'.cache'))
		{
			require 'cache/'.$currentController.'_'.$currentAction.'.cache';

		} else {

			$c = new $currentController();
			/*ob_start();
				call_user_func_array(array($c, $currentAction), $params);
				$html = ob_get_contents();
			ob_end_clean();

			file_put_contents('cache/'.$currentController.'_'.$currentAction.'.cache', $html);*/
			call_user_func_array(array($c, $currentAction), $params);
		}
	}

	function checkRoutes($url)
	{
		global $routes;

		foreach($routes as $pt => $newurl) {

			// Identifica os argumentos e substitui por regex
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

			// Faz o match da URL
			if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
				array_shift($matches);
				array_shift($matches);

				// Pega todos os argumentos para associar
				$itens = array();
				if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
					$itens = preg_replace('(\{|\})', '', $m[0]);
				}

				// Faz a associação
				$arg = array();
				foreach($matches as $key => $match) {
					$arg[$itens[$key]] = $match;
				}

				// Monta a nova url
				foreach($arg as $argkey => $argvalue) {
					$newurl = str_replace(':'.$argkey, $argvalue, $newurl);
				}

				$url = $newurl;
				break;
			}
		}
		return $url;
	}
}

?>