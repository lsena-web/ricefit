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

    /**
     * Método responsável por conexão com o banco de dados 
     * return getMessage();
     */
    public static function getConn()
    {
        try {
            self::$connect = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME . ';charset=utf8', self::USER, self::PASS);
            return self::$connect;
        } catch (\PDOException $e) {
            header('Location:' . __DIR__ . '/../error.html');
        }
    }
    /**
     * Método responsável por cadastrar informações
     * @param array
     * return int
     */
    public function create($values)
    {

        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');
        $sql = "INSERT INTO " . '' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $stmt = self::getConn()->prepare($sql);
        $stmt->execute(array_values($values));
        return self::$connect->lastInsertId();
    }
    /**
     * Método responsável por retornar consulta
     * @param string
     * return array
     */
    public function read($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? ' WHERE ' . $where    : ' '; // SE EU TIVER CONTEÚDO NESSA VARIAVEL FAÇA "ISSO" SENÃO FAÇA "AQUILO"
        $order = strlen($order) ? ' ORDER BY ' . $order : ' ';
        $limit = strlen($limit) ? ' LIMIT ' . $limit    : ' ';

        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        $stmt = self::getConn()->query($sql);

        if ($stmt->rowCount() == true) {
            $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $dados = [];
        }
        return $dados;
    }

    /**
     * Método responsável por atualizar informações
     * @param string
     * @param array
     * return boolean
     */
    public function update($where, $values)
    {
        $fields = array_keys($values);
        $sql = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=?' . '  WHERE ' . $where . ' ';
        $stmt = self::getConn()->prepare($sql);
        $stmt->execute(array_values($values));
        if ($stmt->rowCount() != 0) {
            $dados = true;
        } else {
            $dados = false;
        }
        return $dados;
    }

    /**
     * Método responsável por deletar informações
     * @param string
     * return boolean
     */
    public function delete($where)
    {
        $sql = 'DELETE  FROM ' . $this->table . ' WHERE ' . $where . ' ';
        $stmt = self::getConn()->query($sql);
        if ($stmt->rowCount() != 0) {
            $dados = true;
        } else {
            $dados = false;
        }
        return $dados;
    }

    /**
     * Método responsável por retornar consulta sem repetição de informações
     * @param string
     * @param string
     * return array
     */
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

    public function readHorarios($id)
    {
        $sql = "SELECT horarios.*, exercicios.anexo, exercicios.nome FROM horarios, exercicios WHERE idAluno = ? AND horarios.exercicio = exercicios.id";
        $stmt = self::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        if ($stmt->rowCount() == true) {
            $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $dados = [];
        }
        return $dados;
    }
}
