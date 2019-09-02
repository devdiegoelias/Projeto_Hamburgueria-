<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hamburgueria do Sr. Valbernielson</a>
    <ul class="navbar-nav px-3">
        <?php if($_SESSION['permissao'] == "administrador"):?>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?php echo BASE_URL."dashboard";?>">Voltar ao Painel Administrador</a>
            </li>
        <?php endif;?>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo BASE_URL."login/sair";?>">Sair</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <h2>Pedidos</h2>
            <button type="button" class="btn btn-outline-info col-md-12" onclick="consultarHistorico()">Consultar Pedidos Anteriores</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Data Hora</th>
                        <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(isset($listPedidosUser) && !empty($listPedidosUser)):?>
                <?php foreach($listPedidosUser as $list):?>

                    <tr class="text-center">
                        <td><?php echo $list['status'];?></td>
                        <td><?php echo $list['nome'];?></td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($list['data']));?>
                            <?php echo $list['hora'];?>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-personalizado" <?php echo ($list['status'] == 'A Fazer')?'':'disabled';?> onclick="editarPedido(<?php echo $list['id'];?>)">Editar</button>
                        </td>
                    </tr>
                        
                <?php endforeach;?>
                <?php endif;?>                
                </tbody>
             </table>

            
        </div>
        <div class=".col-sm-12 col-md-8">
            <h2>Lanches</h2>
     
                <div class="row">
                    <?php if(isset($listProdutos) && !empty($listProdutos)):?>
                        <?php foreach($listProdutos as $list):?>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <div class="card text-center">
                                    <div class="imgLanche"> 
                                        <img class="card-img-top" src="<?php echo BASE_URL."assets/image/lanche/".$list['img'].".jpg";?>" alt="Card image cap">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title titleLanche"><?php echo $list['nome']?></h5>
                                        <div class="corpoLanche">
                                            <p class="card-text"><?php echo $list['igredientes'];?>.</p>
                                        </div>
                                        <h5 class="card-title">R$ <?php echo number_format($list['preco'], 2, ',', '.')?></h5>
                                        <!--<input type="checkbox" class="pedido" value="<?php ?>">-->
                                        <button class="btn btn-primary" onclick="selecionar(<?php echo $list['id']?>)">Selecionar</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
      
    
            <!-- Button trigger modal -->
            

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
                    ...
                </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>
</div>

        