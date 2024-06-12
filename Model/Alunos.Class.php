<?php
include 'DAO.Class.php';
class Alunos extends DAO{
    protected $nome;          
    protected $nascimento;
    protected $turma;            
    protected $nacionalidade;
    protected $endereco;

    function __construct()
    {
        
    }

    public function getNome()
    {
        return $this->nome;
    }

  
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

   
    public function getNascimento()
    {
        return $this->nascimento;
    }

   
    public function setNascimento($nascimento): self
    {
        $this->nascimento = $nascimento;

        return $this;
    }

   
    public function getTurma()
    {
        return $this->turma;
    }

   
    public function setTurma($turma): self
    {
        $this->turma = $turma;

        return $this;
    }

   
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

   
    public function setNacionalidade($nacionalidade): self
    {
        $this->nacionalidade = $nacionalidade;

        return $this;
    }

  
    public function getEndereco()
    {
        return $this->endereco;
    }


    public function setEndereco($endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }
}

?>