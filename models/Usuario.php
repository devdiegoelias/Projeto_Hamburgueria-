<?php
class Usuario{
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $endereco;
    private $bairro;
    private $cidade;
    private $permissao;

    /*
        Todos dados sуo recebidos com addslashes e na classe DAO, e realizado verificaчуo de cada informaчуo
        assim garantindo seguranчу e confiabilidade
    */

    public function setNome($s){
        $this->nome = addslashes($s);
    }
    public function setEmail($e){
        $this->email = addslashes($e);
    }
    public function setSenha($s){
        $this->senha = md5(addslashes($s));
    }
    public function setTelefone($t){
        $this->telefone = addslashes($t);
    }
    public function setEndereco($e){
        $this->endereco = addslashes($e);
    }
    public function setBairro($b){
        $this->bairro = addslashes($b);
    }
    public function setCidade($c){
        $this->cidade = addslashes($c);
    }
    public function setPermissao($p = "cliente"){
        $this->permissao = addslashes($p);
    }

    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getPermissao(){
        return $this->permissao;
    }

    /*Verificaчѕes se as senhas sуo iguais*/
    public function verificacaoSenha($s1, $s2){

        if($s1 == $s2){
            $this->setSenha($s1);
            return true;
        } else {
            return false;
        }
    }
}
?>