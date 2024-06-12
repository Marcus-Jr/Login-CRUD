<?php
class DAO
{
    private $NomeDB;
    private $Senha;
    private $sucesso;

    public function Conexao()
    {
        $hostname = "localhost";
        $bancodedados = "alunos";
        $usuario = "root";
        $senha = "";


        $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
        if ($conexao->connect_errno) {
            $mensagem = "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
        } else {
            $mensagem = "Conectado!";
        }
        return $conexao;
        return $mensagem;
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
        $resultado = $salvar->fetch(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
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
