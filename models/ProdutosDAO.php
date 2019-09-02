<?php
class ProdutosDAO extends model{
    
    public function listProdutos(){

        $sql = $this->db->query("SELECT * FROM produtos");

        /*Verificaчуo se houve retorno*/
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            return $sql;
        }
    }

    public function cadastroLanches($lanches){
        
        $sql = $this->db->prepare("INSERT INTO produtos (nome, igredientes, preco, img) VALUES (:nome, :ingredientes, :preco, :img)");
        $sql->bindValue(':nome', $lanches->getLanches());
        $sql->bindValue(':ingredientes', $lanches->getIngredientes());
        $sql->bindValue(':img', $lanches->getImage());
        $sql->bindValue(':preco', $lanches->getPreco());
        $sql->execute();

        header("Location:".BASE_URL."/dashboard/produtos");
    }
}
?>