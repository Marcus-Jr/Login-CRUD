<?php
include '../Model/DAO.Class.php';

class Login extends DAO {

private $login;
private $senha;


    public function FazLogin($dadosArray){
        $this->Login($dadosArray);
    }

    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login): self
    {
        $this->login = $login;

        return $this;
    }


    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha): self
    {
        $this->senha = $senha;

        return $this;
    }
}

$post = file_get_contents('php://input');
$objetoJson= json_decode($post);
$dadosArray = get_object_vars($objetoJson);
$DadosParaFuncao = get_object_vars($dadosArray['dados']);
$funcao = $dadosArray['funcao'];
$ObjLogin = new Login;
$ObjLogin->$funcao($DadosParaFuncao);

?>