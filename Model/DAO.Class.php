<?php
class DAO
{
    private $NomeDB;
    private $Senha;

    public function Conexao()
    {
        $hostname = "localhost";
        $bancodedados = "alunos";
        $usuario = "root";
        $senha = "";


        $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
        if ($conexao->connect_errno) {
            echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
        } else {
            echo "Conectado!";
        }
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

        $resultado = $salvar->fetch(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    public function InserirNoBanco($dadosArray)
    {

        $conexao = $this->Conexao();

        $tabela = 'nome da tabela';
        $nome = $dadosArray["nome"];
        $nascimento = $dadosArray["nascimento"];
        $turma = $dadosArray['turma'];
        $nacionalidade = $dadosArray['nac'];
        $endereco = $dadosArray['end'];

        $salvar = $conexao->prepare("insert into $tabela values (default,'$nome','$nascimento','$turma','$nacionalidade','$endereco')");
        $salvar->execute();
    }

    public function ListarAlunos(){
        
        $conexao = $this->conexao();

        $tabela = 'nome da tabela';
        $salvar = $conexao->prepare("select * from $tabela");
        $salvar->execute();
        $resultado = $salvar->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }
}
