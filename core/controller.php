<?php
class controller {

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function loadLogin($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/login.php';
	}

	/*criado para nao passar pelo templete*/
	public function loadRelatorio($viewData) {
		extract($viewData);
		require 'views/relatorio.php';
	}
}