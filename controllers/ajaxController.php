<?php
class ajaxController extends model{

    public function iniciarPreparacao(){

        $id = addslashes($_POST['id']);

        $sql = $this->db->prepare("UPDATE pedidos SET status = 'Em Andamento' WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function terminarPreparacao(){

        $id = addslashes($_POST['id']);

        $sql = $this->db->prepare("UPDATE pedidos SET status = 'Concluido' WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function enviarEmail(){
        //$email = $_POST['email'];
        $email = "elias.diego@live.com";
        
        $nome  = "Hamburgueria do Sr. Valbernielso";
		$ass   = "Pedido";
		$msg   = "Seu pedido esta pronto!";

        $para = "elias.diego@live.com";
        $assunto = "Contato do site Comercido Dois Corregos";

        $corpo = 	"Nome:  ".$nome.
                    "\r\n".
                    "E-mail:  ".$email.
                    "\r\n".
                    "Assunto:  ".$ass.
                    "\r\n".
                    "\r\n".
                    "Mensagem:  ".$msg;

        $cabecalho = "From: elias.diego@live.com"."\r\n".
                        "Reply-To: ".$email."\r\n".
                        "X-Mailer: PHP/".phpversion();

        mail($para, $assunto, $corpo, $cabecalho);
    }

    public function apagarProduto(){
        $id = addslashes($_POST['id']);

        $sql = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        header("Location: ".BASE_URL."dashboard/produtos");
    }
}
?>