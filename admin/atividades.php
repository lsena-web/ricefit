<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('alunos');

$geral = new \App\Controller\Geral();

$table =  $con->read();

$caminho = "arquivos/alunos/";


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/atividades.php';
include __DIR__ . '/../includes/admin/footer.php';
