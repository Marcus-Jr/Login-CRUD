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
$ObjetoDados = json_decode($post);
$dadosArray = get_object_vars($ObjetoDados);
$DadosParaFuncao = get_object_vars($dadosArray['dados']);
$funcao = $dadosArray['funcao'];
$ObjAlunos = new DadosController;
$ObjAlunos->$funcao($DadosParaFuncao);

?>