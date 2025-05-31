<?php 

include_once 'DAO.Class.php';

class Login extends DAO {

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $dataCadastro;
    private $dataUltimoLogin;

    const TABELA = 'USUARIOS';

    const ID = 'ID_USU';
    const USUARIO = 'USUARIO';
    const EMAIL = 'EMAIL';
    const SENHA = 'SENHA';
    const DATA_CADASTRO = 'DATA_CADASTRO';
    const DATA_ULTIMO_LOGIN = 'DATA_ULTIMO_LOGIN';

    public function __construct() 
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    public function getDataUltimoLogin()
    {
        return $this->dataUltimoLogin;
    }

    public function setDataUltimoLogin($dataUltimoLogin)
    {
        $this->dataUltimoLogin = $dataUltimoLogin;

        return $this;
    }
}