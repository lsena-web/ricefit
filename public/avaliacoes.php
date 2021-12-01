<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::loginCliente();

$con = new \App\Model\Conexao('avaliacoes');

$table = $con->read('idAluno = ' . $_SESSION['cliente']['id']);



include __DIR__ . '/../includes/alunos/header.php';
include __DIR__ . '/../view/alunos/avaliacoes.php';
include __DIR__ . '/../includes/alunos/footer.php';
