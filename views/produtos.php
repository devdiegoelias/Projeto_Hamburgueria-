<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hamburgueria do Sr. Valbernielson</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo BASE_URL;?>">Fazer meu proprio pedido</a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo BASE_URL."login/sair";?>">Sair</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <h2>Deshborad</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL."dashboard";?>">Operacional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL."dashboard/gerencial";?>">Gerencial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL."dashboard/produtos";?>">Produtos</a>
                </li>
            </ul>
        </div>

        <div class="col-sm-12 col-md-10">
            <h2>Lanches</h2>
            <div class="col-sm-12 col-md-8">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nome do Lanche</label>
                        <input type="text" class="form-control" name="lanche" required placeholder="Digite o nome do novo lanche">

                    </div>
                    <div class="form-group" id="ingrediente">
                        <label>Ingredientes</label>
                        <input type="text" class="form-control" required name="ingrediente[]" placeholder="Escreva o nome do de um Ingrediente">
                    </div>

                    <div class="form-group" id="ingrediente">
                        <label>Preço</label>
                        <input type="text" class="form-control preco" required name="preco" placeholder="Digite o valor do lanche">
                    </div>

                    <div class="form-group">
                        <label>Imagem do Produto</label>
                        <input type="file" name="foto" class="form-control-file">
                    </div>
                    
                    <button type="button" class="btn btn-primary btn-personalizado btn-personalizado2" onclick="addIngrediente()">+ Ingredientes</button>
                    <button type="submit" class="btn btn-primary btn-personalizado btn-personalizado2">Cadastrar Lanche</button>
                </form>
            </div>

            <div class="col-sm-12 col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Lanche</th>
                            <th scope="col">Ingredientes</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Açoes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($listProdutos):?>
                            <?php foreach($listProdutos as $list):?>
                                <tr>
                                    <th scope="row"><?php echo $list['id'];?></th>
                                    <td><?php echo $list['nome'];?></td>
                                    <td><?php echo $list['igredientes'];?></td>
                                    <td><?php echo "R$ ".$list['preco'];?></td>
                                    <td>
                                        <?php if(!$list['img'] == ""): ?>
                                            <img class="imgProduto" src="<?php echo BASE_URL.'assets/image/lanche/'.$list['img'].".jpg"; ?>">
                                        <?php else:?>
                                            <img class="imgProduto" src="<?php echo BASE_URL.'assets/image/lanche/padrao.jpg'?>">
                                        <?php endif;?>
                                    </td>
                                    <td> <button class="btn btn-danger btn-personalizado" onclick="excluirPro(<?php echo $list['id'];?>)">Excluir</button> </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fixa de Pedidos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="footerModal"></div>
                </div>
            </div>
            </div>

    </div>
</div> 