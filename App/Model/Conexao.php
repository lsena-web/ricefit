<?php

namespace App\Model;

class Conexao
{

    const HOST = 'localhost';
    const NAME = 'ricefit';
    const USER = 'root';
    const PASS = '';

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
}
