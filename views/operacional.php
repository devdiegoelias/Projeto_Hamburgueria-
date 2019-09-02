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

        <div class=".col-sm-12 col-md-10">
            <h2>Operacional</h2>
            <div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="7">A Fazer</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Pedido</th>
                            <th>Quantidade</th>
                            <th>Igredientes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($listAfazer) && !empty($listAfazer)):?>
                            <?php foreach($listAfazer as $list):?>
                                <tr>
                                    <td><?php echo date("d/m/Y",strtotime($list['data']));?></td>
                                    <td><?php echo date("H:m",strtotime($list['hora']));?></td>
                                    <td><?php echo $list['nome'];?></td>
                                    <td><?php echo $list['quantidade'];?></td>
                                    <td><?php echo $list['igredientes'];?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-personalizado" onclick="editarPedido(<?php echo $list['id'];?>)">Editar</button>
                                        <button type="button" class="btn btn-success btn-personalizado" onclick="iniciarPreparacao(<?php echo $list['id'];?>)">Iniciar</button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>

            <div>
            <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="7">Em Andamento</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Pedido</th>
                            <th>Quantidade</th>
                            <th>Igredientes</th>
                            <th>Tempo de Pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($listEmAndamento) && !empty($listEmAndamento)):?>
                            <?php foreach($listEmAndamento as $list):?>
                                <tr>
                                    <td><?php echo date("d/m/Y",strtotime($list['data']));?></td>
                                    <td><?php echo date("H:m",strtotime($list['hora']));?></td>
                                    <td><?php echo $list['nome'];?></td>
                                    <td><?php echo $list['quantidade'];?></td>
                                    <td><?php echo $list['igredientes'];?></td>
                                    <td><?php echo $list['tempo'];?></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-personalizado btn-personalizado2" onclick="terminarPreparacao(<?php echo $list['id'];?>)">Marcar Pronto</button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>

            <div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="10">Pronto</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Pedido</th>
                            <th>Quantidade</th>
                            <th>Igredientes</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($listConcluido) && !empty($listConcluido)):?>
                            <?php foreach($listConcluido as $list):?>
                                <tr>
                                    <td><?php echo date("d/m/Y", strtotime($list['data']));?></td>
                                    <td><?php echo date("H:m", strtotime($list['hora']));?></td>
                                    <td><?php echo $list['nome'];?></td>
                                    <td><?php echo $list['quantidade'];?></td>
                                    <td><?php echo $list['igredientes'];?></td>
                                    <td><?php echo $list['usuario'];?></td>
                                    <td><?php echo $list['telefone'];?></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-personalizado btn-personalizado2" onclick="enviarEmail('<?php echo $list['email'];?>')"> Enviar E-mail</button>
                                    </td>
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
                    ...
                </div>
                </div>
            </div>
            </div>

    </div>
</div> 