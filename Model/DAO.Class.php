<?php
class DAO
{

    public function connect()
    {
        $connect = new PDO('mysql:host=localhost; dbname=school_crud', "root", "", array(
            PDO::ATTR_PERSISTENT => true
        ));
        return $connect;
    }

    public function executeOne($sql, $data = null){
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);
            $return = $stmt->fetch(PDO::FETCH_ASSOC);
            return $return ? $return : true;
        } catch (Exception $e){
            return ['error' => $e->getMessage()];
        }
    }

    public function executeAll($sql, $data = null){
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            return ['error' => $e->getMessage()];
        }
    }
    
    public function Inserir($tabela, $dados){

        $campos = implode(", ", array_keys($dados));
        $values = array_values($dados);
        $placeholders = implode(", ", array_fill(0, count($dados), "?"));
        $sql = "INSERT INTO $tabela ($campos) VALUES ($placeholders)";
        $resultado = $this->executeOne($sql, $values);
        echo json_encode($resultado);

    }

    public function Listar($tabela){

        $sql = "SELECT * FROM $tabela";
        $resultado = $this->executeAll($sql);
        echo json_encode($resultado);

    }

    public function Buscar($tabela, $condicao){

        $whereClause = $this->processaCondicao($condicao);
        $sql   = "SELECT * FROM $tabela WHERE $whereClause[clause]";
        $result = $this->executeOne($sql, $whereClause['values']);
        echo json_encode($result);

    }

    public function BuscarCampos($tabela, $condicao, $campos){

        $campos = $this->processaCampos($campos);
        $whereClause = $this->processaCondicao($condicao);
        $sql   = "SELECT $campos FROM $tabela WHERE $whereClause[clause] ";
        $result = $this->executeOne($sql, $whereClause['values']);
        echo json_encode($result);

    }

    public function Excluir($tabela, $condicao){

        $whereClause = $this->processaCondicao($condicao);
        $sql = "DELETE FROM $tabela WHERE $whereClause[clause]";
        $return = $this->executeOne($sql, $whereClause['values']);
        echo json_encode($return);
    }

    public function Editar($tabela, $dados, $condicao){
        
        $set = $this->processaDados($dados);
        $whereClause = $this->processaCondicao($condicao);
        $sql   = "UPDATE $tabela SET $set WHERE $whereClause[clause]";
        $return = $this->executeOne($sql, $whereClause['values']);
        echo json_encode($return);
    }

    public function processaDados($dados){
        $setPartes = [];
        foreach ($dados as $coluna => $valor) {
            $valorEscapado = addslashes($valor);
            $setPartes[] = "$coluna = '$valorEscapado'";
        }
        $set = implode(", ", $setPartes);
        
        return $set;
    } 

    public function processaCondicao($condicao) {
        $clauseParts = [];
        $values = [];

        foreach ($condicao as $coluna => $valor) {
            $clauseParts[] = "$coluna = ?";
            $values[] = $valor;
        }

        return [
            'clause' => implode(" AND ", $clauseParts),
            'values' => $values
        ];
    }

    public function processaValues($dados){
        return implode(" , ", array_map(function ($valor) {
            return "'" . addslashes($valor) . "'";
        }, array_values($dados)));
    }

    public function processaCampos($dados){
        return implode(" , ", array_map(function ($valor) {
            return addslashes($valor);
        }, array_values($dados)));
    }

}
