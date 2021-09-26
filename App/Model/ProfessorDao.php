<?php

namespace App\Model;

use App\Model\Conexao;

use App\Controller\Professor;

class ProfessorDao
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function create($values)
    {
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');
        $sql = "INSERT INTO " . '' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(array_values($values));
        return $stmt;
    }

    public function read($where = null)
    {
        $where = strlen($where) ? ' WHERE ' . $where    : ' '; // SE EU TIVER CONTEÚDO NESSA VARIAVEL FAÇA "ISSO" SENÃO FAÇA "AQUILO"
        $sql = "SELECT * FROM $this->table" . ' ' . "$where";
        $stmt = Conexao::getConn()->query($sql);
        if ($stmt->rowCount() == true) {
            $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $dados = [];
        }
        return $dados;
    }

    public function update($where, $values)
    {
        $fields = array_keys($values);
        $sql = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=?' . '  WHERE ' . $where . ' ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(array_values($values));
        return $stmt;
    }

    public function delete($where)
    {
        //monta a sql
        $sql = 'DELETE  FROM ' . $this->table . ' WHERE ' . $where . ' ';
        $stmt = Conexao::getConn()->query($sql);
        return $stmt;
    }

    // METODO RESPONSAVEL POR BUSCAR INFORMAÇÕES DISTINTAS
    public function readDistinto($column, $where = null)
    {
        $where = strlen($where) ? ' WHERE ' . $where    : ' '; // SE EU TIVER CONTEÚDO NESSA VARIAVEL FAÇA "ISSO" SENÃO FAÇA "AQUILO"
        $sql = "SELECT DISTINCT $column FROM $this->table" . ' ' . "$where";
        $stmt = Conexao::getConn()->query($sql);
        if ($stmt->rowCount() == true) {
            $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $dados = [];
        }
        return $dados;
    }
}
