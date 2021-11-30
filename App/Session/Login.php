<?php

namespace App\Session;

class Login
{
    // metodo responsavel por iniciar uma sessão caso não esteja iniciada
    public static function init()
    {
        //verifica status da sessão
        if (session_status() !== PHP_SESSION_ACTIVE) {

            //INICIA SESSÃO
            session_start();
        }
    }

    // METODO RESPONSÁVEL POR VERIFICAR SE O USUÁRIO NÃO ESTÁ LOGADO
    public static function login()
    {
        self::init();

        if (!isset($_SESSION['usuario']) ||  empty($_SESSION['usuario']) || $_SESSION['usuario']['logado'] !== true) {
            header('location: login.php');
            exit;
        }
    }
    // METODO RESPONSÁVEL POR VERIFICAR SE USUÁRIO ESTÁ LOGADO
    public static function logado()
    {
        self::init();
        if (isset($_SESSION['usuario']) &&  !empty($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
            header('location: home.php');
            exit;
        }
    }
    // METODO RESPONSÁVEL POR DESLOGAR USUÁRIO
    public static function logout()
    {
        self::init();
        // REMOVE A SESSÃO DE USUÁRIO
        unset($_SESSION['usuario']);
        header('location: login.php');
        exit;
    }

    //---------------------------------------------------------------------------------------------------------

    // METODO RESPONSÁVEL POR VERIFICAR SE O USUÁRIO NÃO ESTÁ LOGADO
    public static function loginCliente()
    {
        self::init();

        if (!isset($_SESSION['cliente']) ||  empty($_SESSION['cliente']) || $_SESSION['cliente']['logado'] !== true) {
            header('location: ../index.php');
            exit;
        }
    }
    // METODO RESPONSÁVEL POR VERIFICAR SE USUÁRIO ESTÁ LOGADO
    public static function logadoCliente()
    {
        self::init();
        if (isset($_SESSION['cliente']) &&  !empty($_SESSION['cliente']) && $_SESSION['cliente']['logado'] == true) {
            header('location: public/home.php');
            exit;
        }
    }
    // METODO RESPONSÁVEL POR DESLOGAR USUÁRIO
    public static function logoutCliente()
    {
        self::init();
        // REMOVE A SESSÃO DE USUÁRIO
        unset($_SESSION['cliente']);
        header('location: ../index.php');
        exit;
    }
}
