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
            <h2>Gerencial</h2>
            
            <div class="row">
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total de pedidos Hoje</h5>
                            <h4 class="h1"><?php echo $placar['hoje'];?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total de Pedidos essa Semana</h5>
                            <h4 class="h1"><?php echo $placar['semana'];?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total pedidos Geral</h5>
                            <h4 class="h1"><?php echo $placar['geral'];?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Faturamento Hoje</h5>
                            <h4 class="h1">R$ <?php echo number_format($placarFaturamento['hoje'], 2, ',', '.');?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Faturamento esse Mês</h5>
                            <h4 class="h1">R$ <?php echo number_format($placarFaturamento['semana'], 2, ',', '.');?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Faturamento Geral</h5>
                            <h4 class="h1">R$ <?php echo number_format($placarFaturamento['geral'], 2, ',', '.');?></h4>
                        </div>
                    </div>
                </div>

            </div>
            <h2 class="h3">Grafico Semanal <?php echo $infoSemanal['date'][7]?> a <?php echo $infoSemanal['date'][1]?></h2>
            <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
        </div>

    </div>
</div> 

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [
            "<?php echo $infoSemanal['date'][7]?>",
            "<?php echo $infoSemanal['date'][6]?>",
            "<?php echo $infoSemanal['date'][5]?>",
            "<?php echo $infoSemanal['date'][4]?>",
            "<?php echo $infoSemanal['date'][3]?>",
            "<?php echo $infoSemanal['date'][2]?>",
            "<?php echo $infoSemanal['date'][1]?>"
          ],
          datasets: [{
            data: [
                <?php echo $infoSemanal['dados'][7]?>,
                <?php echo $infoSemanal['dados'][6]?>,
                <?php echo $infoSemanal['dados'][5]?>,
                <?php echo $infoSemanal['dados'][4]?>,
                <?php echo $infoSemanal['dados'][3]?>,
                <?php echo $infoSemanal['dados'][2]?>,
                <?php echo $infoSemanal['dados'][1]?>
            ],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>