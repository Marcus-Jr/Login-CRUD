<?php
class DAO
{
    private $NomeDB;
    private $Senha;
    private $sucesso;

    public function Conexao()
    {
        $hostname = "localhost";
        $bancodedados = "cadastro";
        $usuario = "root";
        $senha = "";

        $conexao = new PDO('mysql:host=localhost; dbname=cadastro', "root", "", array(
            PDO::ATTR_PERSISTENT => true
        ));
        return $conexao;
    }
    
    public function SelecionaIdAluno($dadosArray)
    {

        $conexao = $this->Conexao();

        $tabela = 'nome da tabela';
        $coluna = 'nome da coluna';
        $id = $dadosArray;
        $salvar = $conexao->prepare("select * from $tabela where $coluna = '$id'");
        $salvar->execute();

        $resultado = $salvar->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    public function InserirNoBanco($dadosArray)
    {

        $conexao = $this->Conexao();

        $tabela = 'alunos';
        $nome = $dadosArray["nome"];
        $nascimento = $dadosArray["nascimento"];
        $turma = $dadosArray['turma'];
        $nacionalidade = $dadosArray['nacionalidade'];
        $endereco = $dadosArray['endereco'];

        $salvar = $conexao->prepare("insert into $tabela values (default,'$nome','$nascimento','$turma','$nacionalidade','$endereco')");
        $salvar->execute();
    }

    public function ListarAlunos($dadosArray){
        
        $conexao = $this->conexao();

        $tabela = 'alunos';
        $salvar = $conexao->prepare("select * from $tabela");
        $salvar->execute();
        $resultado = $salvar->fetch(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    public function Login($dadosArray){

        $conexao = $this->conexao();

        $tabela = 'login';
        $login = $dadosArray['email'];
        $senha = $dadosArray['senha'];
        $salvar = $conexao->prepare("insert into $tabela values (default,'$login','$senha')");
        $salvar -> execute();

    }

   
    public function getNomeDB()
    {
        return $this->NomeDB;
    }

    public function setNomeDB($NomeDB): self
    {
        $this->NomeDB = $NomeDB;

        return $this;
    }

   
    public function getSenha()
    {
        return $this->Senha;
    }

   
    public function setSenha($Senha): self
    {
        $this->Senha = $Senha;

        return $this;
    }

   
    public function getSucesso()
    {
        return $this->sucesso;
    }

   
    public function setSucesso($sucesso): self
    {
        $this->sucesso = $sucesso;

        return $this;
    }
}
