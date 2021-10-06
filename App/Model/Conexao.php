<?php

namespace App\Model;

class Conexao
{

    const HOST = 'localhost';
    const NAME = 'ricefit';
    const USER = 'root';
    const PASS = '';
    private $table;

    public function __construct($table = null)
    {
        $this->table = $table;
    }

    public static $connect;

    public static function getConn()
    {
        try {
            self::$connect = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME . ';charset=utf8', self::USER, self::PASS);
            return self::$connect;
        } catch (\PDOException $e) {
            echo 'ERROR' . $e->getMessage();

            echo '<br>';
            echo '<pre >';
            var_dump($e);
            echo '</pre>';
        }
    }

    public function create($values)
    {

        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');
        $sql = "INSERT INTO " . '' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $stmt = self::getConn()->prepare($sql);
        $stmt->execute(array_values($values));
        return $stmt;
    }

    public function read($where = null)
    {
        $where = strlen($where) ? ' WHERE ' . $where    : ' '; // SE EU TIVER CONTEÚDO NESSA VARIAVEL FAÇA "ISSO" SENÃO FAÇA "AQUILO"
        $sql = "SELECT * FROM $this->table" . ' ' . "$where";
        $stmt = self::getConn()->query($sql);
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
        $stmt = self::getConn()->prepare($sql);
        $stmt->execute(array_values($values));
        return $stmt;
    }

    public function delete($where)
    {
        //monta a sql
        $sql = 'DELETE  FROM ' . $this->table . ' WHERE ' . $where . ' ';
        $stmt = self::getConn()->query($sql);
        return $stmt;
    }

    // METODO RESPONSAVEL POR BUSCAR INFORMAÇÕES DISTINTAS
    public function readDistinto($column, $where = null)
    {
        $where = strlen($where) ? ' WHERE ' . $where    : ' '; // SE EU TIVER CONTEÚDO NESSA VARIAVEL FAÇA "ISSO" SENÃO FAÇA "AQUILO"
        $sql = "SELECT DISTINCT $column FROM $this->table" . ' ' . "$where";
        $stmt = self::getConn()->query($sql);
        if ($stmt->rowCount() == true) {
            $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $dados = [];
        }
        return $dados;
    }
}
