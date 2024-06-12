<?php
include_once '../Model/DAO.Class.php';
include_once '../Model/Alunos.Class.php';

class DadosController extends Alunos {

    public function InserirAluno($dadosArray){
        $this->InserirNoBanco($dadosArray);
    }
}



$post = file_get_contents('php://input');
$objDados = json_decode($post);
$dadosArray = get_object_vars($objDados);
$dadosAluno = get_object_vars($dadosArray['dados']);
var_dump($dadosArray);
die;
$funcao = $dadosArray['funcao'];
$objAlunos = new DadosController;
$objAlunos->$funcao($dadosAluno);
?>