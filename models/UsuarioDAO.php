<?php
class UsuarioDAO extends model{
    public function login($user){
        
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':senha', $user->getSenha());
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();

            $_SESSION['login'] = $sql['id'];
            $_SESSION['permissao'] = $sql['permissao'];
            
            if($sql['permissao'] == "administrador"){
                header("Location: ".BASE_URL."dashboard");
            } else {
                header("Location: ".BASE_URL."home");
            }

            exit;
        } else {
           header("Location: ".BASE_URL."login");
           exit;
        }
    }
    public function cadastroUser($user){

        $sql = $this->db->prepare("INSERT INTO usuario (nome, email, senha, telefone, endereco, bairro, cidade, permissao)
                                    VALUES (:nome, :email, :senha, :telefone, :endereco, :bairro, :cidade, :permissao)");
        $sql->bindValue(':nome', $user->getNome());
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':senha', $user->getSenha());
        $sql->bindValue(':telefone', $user->getTelefone());
        $sql->bindValue(':endereco', $user->getEndereco());
        $sql->bindValue(':bairro', $user->getBairro());
        $sql->bindValue(':cidade', $user->getCidade());
        $sql->bindValue(':permissao', $user->getPermissao());
        $sql->execute();

        header("Location:".BASE_URL."login");
    }
}
?>