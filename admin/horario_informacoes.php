<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Session\Login;

Login::init();

// Conexão com a tabela horarios
$con = new \App\Model\Conexao('horarios');

// Instanciando horario
$horarios = new \App\Includes\Horario;

// buscas informações do calendário pelo o id do usuário
$calendario = $con->read('idAluno = ' . $_SESSION['id']);

// informando dados do usuário
echo $horarios->format($calendario);
