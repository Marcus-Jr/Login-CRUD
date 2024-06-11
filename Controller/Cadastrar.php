<?php
include_once "../Model/DAO.Class.php";

$post = file_get_contents('php://input');
$objetoJson = json_decode($post);
$dadosArray = get_object_vars($objetoJson->dados);
var_dump($dadosArray);

echo AdicionarTeste($dadosArray);

function AdicionarTeste($dadosArray){
    $conexao = conexao();


} 
?>