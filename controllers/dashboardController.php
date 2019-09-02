<?php
class dashboardController extends controller {

	public function index() {
		$dados = array();

		$pedidoDAO = new PedidoDAO();

		$listAfazer = $pedidoDAO->aFazer();
		$listEmAndamento = $pedidoDAO->emAndamento();
		$listConcluido = $pedidoDAO->concluido();


		$dados['listAfazer'] = $listAfazer;
		$dados['listEmAndamento'] = $listEmAndamento;
		$dados['listConcluido'] = $listConcluido;
		$this->loadTemplate('operacional', $dados);
	}

	public function gerencial() {
		$dados = array();

		$pedidoDAO = new PedidoDAO();
		$placar = $pedidoDAO->placar();

		$infoSemanal = $pedidoDAO->infoSemanal();
		$placarFaturamento = $pedidoDAO->placarFaturamento();

		$dados['infoSemanal'] = $infoSemanal;
		$dados['placar'] = $placar;
		$dados['placarFaturamento'] = $placarFaturamento;
		$this->loadTemplate('gerencial', $dados);
	}

	public function produtos() {
		$dados = array();

		$produtos = new Produtos();
		$produtosDAO = new produtosDAO();
		$pedidoDAO = new PedidoDAO();

		if(isset($_POST['lanche']) && !empty($_POST['lanche']) &&
			isset($_POST['ingrediente']) && !empty($_POST['ingrediente'])){

			$produtos->setLanches($_POST['lanche']);
			$produtos->setIngredientes($_POST['ingrediente']);
			$produtos->setPreco($_POST['preco']);
			$produtos->setImage($_FILES['foto']);
			$produtosDAO->cadastroLanches($produtos);
		}

		$listProdutos = $produtosDAO->listProdutos();
	
		$dados['listProdutos'] = $listProdutos;
		$this->loadTemplate('produtos', $dados);
	}
}
?>

