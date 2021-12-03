<?php

include_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('alunos');
$con1 = new \App\Model\Conexao('exercicios');

// CONTADORES
$alunos     = $con->read(null, null, null, 'COUNT(id) as quantidade');
$exercicios = $con1->read(null, null, null, 'COUNT(id) as quantidade');


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/principal.php';
include __DIR__ . '/../includes/admin/footer.php';
