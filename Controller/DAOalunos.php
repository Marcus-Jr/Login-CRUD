<?php
include_once '../Model/Alunos.Class.php';

class DadosController extends Alunos
{

    public function InserirAluno($dados)
    {
        $aluno = [
            Alunos::NOME          => $dados->nome,
            Alunos::NASCIMENTO    => $dados->nascimento,
            Alunos::TURMA         => $dados->turma,
            Alunos::NACIONALIDADE => $dados->nacionalidade,
            Alunos::ENDERECO      => $dados->endereco
        ];
        $this->Inserir(Alunos::TABELA, $aluno);
    }

    public function ListarAlunos()
    {
        $this->Listar(Alunos::TABELA);
    }

    public function BuscarAluno($dados)
    {
        $condicao = [Alunos::ID => $dados->id];
        $this->Buscar(Alunos::TABELA, $condicao);
    }

    public function ExcluirAluno($dados)
    {
        $condicao = [Alunos::ID => $dados->id];
        $this->Excluir(Alunos::TABELA, $condicao);
    }

    public function EditarAluno($dados)
    {
        $aluno = [
            Alunos::NOME          => $dados->nome,
            Alunos::NASCIMENTO    => $dados->nascimento,
            Alunos::TURMA         => $dados->turma,
            Alunos::NACIONALIDADE => $dados->nacionalidade,
            Alunos::ENDERECO      => $dados->endereco
        ];
        $condicao = [Alunos::ID => $dados->id];
        
        $this->Editar(Alunos::TABELA, $aluno, $condicao);
    }
}

$post = file_get_contents('php://input');
$ObjetoDados = json_decode($post);
$dadosArray = get_object_vars($ObjetoDados);
$DadosParaFuncao = $dadosArray['dados'] ? $dadosArray['dados'] : '';
$funcao = $dadosArray['funcao'];
$ObjAlunos = new DadosController;
$ObjAlunos->$funcao($DadosParaFuncao);
