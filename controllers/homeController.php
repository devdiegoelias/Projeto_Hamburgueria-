<?php
class homeController extends controller {

	public function index() {

		if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
			header("Location: ".BASE_URL."login");
		}

		$dados = array();

		$ProdutoDAO = new ProdutosDAO();
		$PedidoDAO = new PedidoDAO();

		$listProdutos = $ProdutoDAO->listProdutos();
		$listPedidosUser = $PedidoDAO->listPedidosUser();

		$dados['listPedidosUser'] = $listPedidosUser;
		$dados['listProdutos'] = $listProdutos;
		$this->loadTemplate('home', $dados);
	}

	public function listarPedido(){

		$id = addslashes($_POST['id']);

		$pedidosDAO = new PedidoDAO();
		$listPedido = $pedidosDAO->listPedido($id);
		?>

		<form>
			<div class="form-group">
				<label><?php echo $listPedido['nome'];?></label>
				<input type="hidden" name="id" value="<?php echo $listPedido['id'];?>">
				<input type="number" name="quant" class="form-control" placeholder="Digite a quantidade desejada">

				<?php 
					$itens = explode(",", $listPedido['igredientes']);
		
					foreach($itens as $i):?>
						<input type="checkbox" name="itens[]" class="pedido" value="<?php echo $i;?>">
						<label><?php echo $i;?></label>
						<br>
					<?php endforeach;?>
			</div>
			
			<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          		<button type="submit" class="btn btn-primary">Adicionar Pedido</button>
        	</div>
		</form>
			
		<?php
	}

	public function confirmarPedido(){

		$nome = addslashes($_POST['id']);
		$quant = addslashes($_POST['quant']);
		$itens = addslashes($_POST['itens']);

		$pedidoDAO = new PedidoDAO();
		$pedidoDAO->confirmarPedido($nome, $quant, $itens);
	}

	public function mudarPedido(){

		$idPedio = addslashes($_POST['idPedido']);
		$idProduto = addslashes($_POST['idProduto']);
		$quant = addslashes($_POST['quant']);
		$itens = addslashes($_POST['itens']);

		$pedidoDAO = new PedidoDAO();
		$pedidoDAO->mudarPedido($idPedio, $idProduto, $quant, $itens);
	}

	public function consultaHistorico(){
		$pedidoDAO = new PedidoDAO();
		$historico = $pedidoDAO->historico();
		?>
			<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Data do Pedido</th>
				<th scope="col">Pedido</th>
				<th scope="col">Quantidade</th>
				<th scope="col">Igredientes</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($historico) && !empty($historico)):?>
					<?php foreach($historico as $h):?>
						<tr>
							<td><?php echo $h['data'];?></td>
							<td><?php echo $h['nome'];?></td>
							<td><?php echo $h['quantidade'];?></td>
							<td>@<?php echo $h['igredientes'];?></td>
						</tr>
					<?php endforeach;?>
					<?php endif;?>
			</tbody>
			</table>
		<?php

	}

	public function editarPedido(){
		$id_pedido = addslashes($_POST['id']);
		$ProdutoDAO = new ProdutosDAO();
		$listProdutos = $ProdutoDAO->listProdutos();
		?>

		<div class=".col-sm-12 col-md-12">
            <h2>Lanches</h2>
     
                <div class="row">
                    <?php foreach($listProdutos as $list):?>
                    <div class="col-sm-12 col-md-4 col-lg-4 text-center espace">
                        <div class="card text-center">
						<div class="imgLanche-modal"> 
                            <img class="card-img-top" src="<?php echo BASE_URL."assets/image/lanche/".$list['img'].".jpg";?>" alt="Card image cap">
                        </div>
                            <div class="card-body">
                                <h5 class="card-title titleLanche-modal"><?php echo $list['nome']?></h5>
                                <div class="corpoLanche-modal">
                                	<p class="card-text"><?php echo $list['igredientes'];?>.</p>
                                </div>
                                <!--<input type="checkbox" class="pedido" value="<?php ?>">-->
                                <button class="btn btn-primary" onclick="trocar(<?php echo $list['id']?>, <?php echo $id_pedido;?>)">Selecionar</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
			</div>

		<?php
	}
}