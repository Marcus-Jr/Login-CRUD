<?php
include '../Model/Login.Class.php';

class LoginController extends Login 
{
    public function InserirAcesso($dados){

        $login = [
            Login::USUARIO => $dados->nome,
            Login::EMAIL => $dados->email,
            Login::SENHA => password_hash($dados->senha, PASSWORD_DEFAULT),
            Login::DATA_CADASTRO => date("Y-m-d"),
            Login::DATA_ULTIMO_LOGIN => date("Y-m-d")
        ];
        return $this->Inserir(Login::TABELA, $login);
    }

    public function Logar($dados){
        
        $user = $this->BuscaUsuario($dados);

        if(!empty($user)){
            if(password_verify($dados->senha, $user['SENHA'])) {
                $retorno = ['success' => true, 'message' => 'Bem vindo,' . $user['USUARIO']];
            } else {
                $retorno = ['success' => false, 'message' => 'Dados incorretos!'];
            }
        } else {
            $retorno = ['success' => false, 'message' => 'Dados incorretos!'];
        }
        
        return json_encode($retorno);
    }

    public function BuscaUsuario($dados){

        $condicao = [Login::EMAIL => $dados->email];
        $campos   = [Login::SENHA , Login::USUARIO, Login::EMAIL];
        return $this->BuscarCampos(Login::TABELA, $condicao, $campos);

    }
}

$post = file_get_contents('php://input');
$ObjetoDados = json_decode($post);
$dadosArray = get_object_vars($ObjetoDados);
$DadosParaFuncao = $dadosArray['dados'] ? $dadosArray['dados'] : '';
$funcao = $dadosArray['funcao'];
$ObjLogin = new LoginController;
$ObjLogin->$funcao($DadosParaFuncao);

?>