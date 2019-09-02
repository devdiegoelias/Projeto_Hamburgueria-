<?php
class PedidoDAO extends model{

    public function listPedido($id){

        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
		$sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                return $sql;
            }
    }
    
    public function listPedidosUser(){

        $sql = $this->db->prepare("SELECT *,
                                    (SELECT pr.nome FROM produtos pr WHERE pr.id = pe.id_produto)'nome'
                                    FROM pedidos pe WHERE pe.id_usuario = :id AND pe.data BETWEEN :s1 AND :s2");
        
        $sql->bindValue(':s1', date('Y-m-d',strtotime("-2 day")));
        $sql->bindValue(':s2', date('Y-m-d',strtotime("-1 day")));
        $sql->bindValue(':id', $_SESSION['login']);
		$sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetchAll();
                return $sql;
            }
    }

    public function confirmarPedido($pro, $quant, $itens){

        $sql = $this->db->prepare("INSERT INTO pedidos (id_usuario, id_produto, quantidade, igredientes, data, hora)
                                    VALUES (:user, :prod, :quant, :igre, CURRENT_DATE, CURRENT_TIME)");

        $sql->bindValue(':user', $_SESSION['login']);
        $sql->bindValue(':prod', $pro);
        $sql->bindValue(':quant', $quant);
        $sql->bindValue(':igre', $itens);
        $sql->execute();
    }

    public function mudarPedido($idPedio, $idProduto, $quant, $itens){

        $sql = $this->db->prepare("UPDATE pedidos SET id_produto = :prod,
                                                        quantidade = :quant,
                                                        igredientes = :igre
                                                        WHERE id = :idPedido ");
                                    
        $sql->bindValue(':prod', $idProduto);
        $sql->bindValue(':quant', $quant);
        $sql->bindValue(':igre', $itens);
        $sql->bindValue(':idPedido', $idPedio);
        $sql->execute();
    }

    public function historico(){

        $sql = $this->db->prepare("SELECT *,(select pr.nome from produtos pr where pr.id = pe.id_produto) 'nome'
                                    FROM pedidos pe WHERE pe.id_usuario = :id AND pe.STATUS = 'concluido'");
        $sql->bindValue(':id', $_SESSION['login']);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();

            return $sql;
        }
    }

    public function aFazer(){

        $sql = $this->db->query("SELECT *, (SELECT pr.nome FROM produtos pr WHERE pr.id = pe.id_produto) 'nome' FROM pedidos pe WHERE STATUS = 'A Fazer' ORDER BY hora DESC");

        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            return $sql;
        }
    }

    public function emAndamento(){

        $sql = $this->db->query("SELECT *, (SELECT pr.nome FROM produtos pr WHERE pr.id = pe.id_produto) 'nome',
                                TIMEDIFF(CURRENT_TIME(), pe.hora) 'tempo'
                                FROM pedidos pe WHERE STATUS = 'Em Andamento' ORDER BY hora DESC");

        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            return $sql;
        }
    }

    public function concluido(){

        $sql = $this->db->query("SELECT *,
                                    (SELECT pr.nome FROM produtos pr WHERE pr.id = pe.id_produto) 'nome',
                                    (SELECT u.nome FROM usuario u WHERE u.id = pe.id_usuario) 'usuario',
                                    (SELECT u.endereco FROM usuario u WHERE u.id = pe.id_usuario) 'endereco',
                                    (SELECT u.telefone FROM usuario u WHERE u.id = pe.id_usuario) 'telefone',
                                    (SELECT u.email FROM usuario u WHERE u.id = pe.id_usuario) 'email'
                                FROM pedidos pe WHERE STATUS = 'Concluido' ORDER BY hora DESC");

        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            return $sql;
        }
    }

    public function placar(){

        $sql = $this->db->prepare("SELECT 
                                (SELECT COUNT(pe.id) FROM pedidos pe WHERE pe.DATA = CURRENT_DATE())'hoje',
                                (SELECT COUNT(pe.id) FROM pedidos pe WHERE pe.data BETWEEN :s1 AND :s2 AND pe.`status` = 'concluido') 'semana',
                                (SELECT COUNT(pe.id) FROM pedidos pe WHERE pe.STATUS = 'concluido') 'geral'");

        $sql->bindValue(':s1', date('Y-m-d',strtotime("-7 day")));
        $sql->bindValue(':s2', date('Y-m-d',strtotime("-1 day")));
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql;
        }

    }

    public function placarFaturamento(){

        $sql = $this->db->prepare("SELECT 
                                    (SELECT SUM(pr.preco) FROM pedidos pe INNER JOIN produtos pr ON(pe.id_produto=pr.id) WHERE pe.DATA = CURRENT_DATE() AND pe.STATUS = 'concluido')'hoje',
                                    (SELECT SUM(pr.preco) FROM pedidos pe INNER JOIN produtos pr ON(pe.id_produto=pr.id) WHERE pe.data BETWEEN :s1 AND :s2 AND pe.`status` = 'concluido') 'semana',
                                    (SELECT SUM(pr.preco) FROM pedidos pe INNER JOIN produtos pr ON(pe.id_produto=pr.id) WHERE pe.STATUS = 'concluido') 'geral'
                                ");
        $sql->bindValue(':s1', date('Y-m-d',strtotime("-7 day")));
        $sql->bindValue(':s2', date('Y-m-d',strtotime("-1 day")));
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql;
        }

    }

    public function infoSemanal(){
        $dados = array();
        //$date = array();
        
        for($i=1; $i<=7; $i++){

            $sql = $this->db->prepare("SELECT COUNT(p.id) FROM pedidos p WHERE p.data = :dia");
            $sql->bindValue(':dia', date('Y-m-d',strtotime("-$i day")));
            $sql->execute();
    
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();

                $dados['dados'][$i] = $sql['0'];
                $dados['date'][$i] = date('d-m',strtotime("-$i day"));
            }
        }
        /*echo "<pre>";
        print_r($dados['date'][1]);
        exit;*/
        return $dados;
    }
}
?>