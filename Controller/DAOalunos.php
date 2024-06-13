<?php
include_once '../Model/Alunos.Class.php';

class DadosController extends Alunos {

    public function InserirAluno($coisa){
        $this->InserirNoBanco($coisa);
    }
}

$post = file_get_contents('php://input');

$ObjetoDados = json_decode($post);
$dadosArray = get_object_vars($ObjetoDados);
$DadosParaFuncao = get_object_vars($dadosArray['dados']);

var_dump($dadosArray);

$funcao = $dadosArray['funcao'];


$ObjAlunos = new DadosController;

$ObjAlunos->$funcao($DadosParaFuncao);
?>