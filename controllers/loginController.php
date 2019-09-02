<?php 
class loginController extends controller{

	public function index(){
		$dados = array();
			
		
		if(isset($_POST['email']) && !empty($_POST['email'])){

			$user = new Usuario();
			$userDAO = new UsuarioDAO();
			
			$user->setEmail($_POST['email']);
			$user->setSenha($_POST['senha']);
			$userDAO->login($user);
		}

		$this->loadTemplate('login', $dados);
	}

	public function cadastro(){
		$dados = array();

		if(isset($_POST['nome'])
		&& !empty($_POST['nome'])
		&& isset($_POST['email'])
		&& !empty($_POST['email'])
		&& isset($_POST['senha1'])
		&& !empty($_POST['senha1'])
		&& isset($_POST['senha2'])
		&& !empty($_POST['senha2'])
		&& isset($_POST['telefone'])
		&& !empty($_POST['telefone'])
		&& isset($_POST['endereco'])
		&& !empty($_POST['endereco'])
		&& isset($_POST['bairro'])
		&& !empty($_POST['bairro'])
		&& isset($_POST['cidade'])
		&& !empty($_POST['cidade'])){

		$user = new Usuario();

			$user->setNome($_POST['nome']);
			$user->setEmail($_POST['email']);
			$user->setTelefone($_POST['telefone']);
			$user->setEndereco($_POST['endereco']);
			$user->setBairro($_POST['bairro']);
			$user->setCidade($_POST['cidade']);
			$user->setPermissao();

			if($user->verificacaoSenha($_POST['senha1'], $_POST['senha2'])){
				$userDAO = new UsuarioDAO();
				$userDAO->cadastroUser($user);
			} else {
				$dados['msg'] = 'Por favor, Preencha a senha corretamente!';
			}

		} else {
			$dados['msg'] = 'Por favor, Preencha todos os dados corretamente!';
		}

		$this->loadTemplate('cadastro', $dados);
	}

	public function sair(){
		
		unset($_SESSION['login']);
		header("Location:".BASE_URL."login");
		exit;
	}
}
?>